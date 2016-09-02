var Popup = function(content) {
    this.elementsCache = {};
    this.closeHandler = null;
    this.$popup = $('<div id="popup"><div></div><div class="popup-bg"></div></div>');
    this.setContent(content);
    $(document.body).append(this.$popup);
};

Popup.prototype.open = function(content) {
    this.setContent(content);
    this.$popup.show();

    //смещаем содержимое body на ширину скролла влево, чтобы избежать мелькания при появлении popup'а
    var widthBefore = $(window).width();
    this.$html = $('html');
    this.$html.css('overflow', 'hidden');
    var scrollWidth = $(window).width() - widthBefore;
    if (scrollWidth > 0) {
        this.$html.css('margin-left', '-' + scrollWidth + 'px');
    }

    //this.setPosition();
    this.resize();
    this.interval = setInterval($.proxy(function() {this.resize()}, this), 1000);

    $(window).keyup($.proxy(function (e) {
        if (e.keyCode === 27) {
            this.close();
        }
    }, this));

    this.$popup.find('#close, .popup-bg').unbind('click').click($.proxy(function (e) {
        this.close();
    }, this));

    var container = $(this.$popup)[0];
    $(container).scroll(function(){
        var scroll = container.scrollTop / (container.scrollHeight - container.clientHeight);
        if (scroll > 0.99) {
            $(this).find('.buttons').addClass('hide-gradient');
        } else {
            $(this).find('.buttons').removeClass('hide-gradient');
        }
    });
};

Popup.prototype.close = function() {
    this.$popup.removeClass('visible');
    this.$popup.css({'padding-top': '0'});
    this.$popup.hide();
    this.$html.css({'overflow': 'visible', 'margin-left': '0'});
    clearInterval(this.interval);

    if (typeof this.closeHandler == 'function') {
        this.closeHandler();
    }
};

Popup.prototype.isVisible = function() {
    return this.$popup.css('display') != 'none';
};

Popup.prototype.setCloseHandler = function(closeHandler) {
    this.closeHandler = closeHandler;
};

Popup.prototype.setContent = function(content) {
    if (content !== undefined) {
        if (!this.elementsCache[content]) {
            this.elementsCache[content] = $(content);
        }
        this.empty();
        this.$popup.children().first().append(this.elementsCache[content].show());
    }
};

Popup.prototype.setPosition = function() {
    this.$popup.css({
        'padding-top': Math.max(
            ($(window).height() - this.$popup.children().first().outerHeight()) / 2,
            parseInt(this.$popup.css('padding-top'))
        )
    });
};

Popup.prototype.resize = function() {
    if($(window).height() < this.$popup.children().first().outerHeight())  {
        // Fast Mac's browsers hack
        if(!(browserNameVer.mac && browserNameVer[0] == 'safari')) {
            this.$popup.addClass('compact');
        }
        this.$popup.css({'padding-top': '30px', 'overflow-y': 'scroll'});
    } else {
        this.$popup.removeClass('compact');
        this.setPosition();
    }
    this.$popup.addClass('visible');
};

Popup.prototype.empty = function() {
    $.each(this.elementsCache, function (i, e) {
        $(e).detach();
    });
    this.$popup.children().first().html('<a id="close"></a>');
};

Popup.prototype.el = function() {
    return this.$popup;
};