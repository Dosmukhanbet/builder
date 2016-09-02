/**
 * Плагин декорирует SELECT в соотвествии с бутстрапом twitter-bootstrap 3.0
 * а так же лечит восстановление первоначальных значений SELECT при reset формы
 * author alex@jivosite.com
 */
(function ($) {

    $.fn.selectDecor = function (_params) {
        var params = {
            width: null,
            maxHeight: 300
        };
        params = $.extend(params, _params);

        var SelectDecor = {
            define: function () {
                this.$decorContainer = $('<div class="btn-group dropdown"></div>');
                this.$decorButton = $('\
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">\
                        <span class="text">&nbsp;</span>\
                        <span class="devision"></span>\
                        <span class="caret"></span>\
                    </button>');
                this.$decorUl = $('<ul class="dropdown-menu select-decor"></ul>');
            },
            initialize: function (selectNode) {
                var self = this,
                    multiple = selectNode.hasAttribute('multiple');
                this.define();
                this.$decorUl.css({
                    'max-height': params.maxHeight,
                    'overflow-x': 'hidden'
                });

                if (params.width) this.$decorContainer.css('width', params.width);
                this.$decorContainer.append(this.$decorButton).append(this.$decorUl);

                if (multiple) {
                    this.$decorContainer.addClass('multi-select');
                }

                $(selectNode).find('option').each(function (i) {
                    var option = this,
                        text = $(this).text(),
                        value = $(this).attr('value'),
                        $li = $('<li></li>').attr('title', text),
                        $a = $li.find('a');

                    var getText = function () {
                            var checked = [];
                            $(selectNode).find('option:selected').each(function () {
                                checked.push($(this).html())
                            });
                            return checked.length ? checked.join(', ') : multiple ? '&nbsp;' : text;
                        },
                        setSelected = function (value) {
                            $(option).prop('selected', value);
                            option.selected = value; // обязательно для фаерфокса !
                            self.$decorButton.find('.text').html(getText());
                            $(selectNode).change();
                            self.$decorUl.find('li').removeClass('active');
                            $li.addClass('active');
                        };

                    if (multiple) {
                        var checkId = $(selectNode).attr('name') +'-'+ $(option).val();
                        $li.prepend($('<label></label>').attr('for', checkId).html(text));
                        $li.prepend($('<label></label>').attr('for', checkId));
                        $li.prepend($('<input type="checkbox" class="checkbox">')
                            .attr('name', $(selectNode).attr('name')+'[]')
                            .attr('value', $(option).val())
                            .attr('id', checkId));
                    } else {
                        $a = $li.append($('<a href="javascript:;"></a>').html(text));
                    }

                    if (option.selected) {
                        selectNode.default_selected_index = i;
                        $li.find('input').attr('checked', true);
                        self.$decorButton.find('.text').html(getText());
                        $li.addClass('active');
                    }

                    if (multiple) {
                        $li.find('input').change(function(e) {
                            setSelected($(e.target).is(':checked'));
                        });
                        $li.click(function(e) {
                            e.stopPropagation();
                        });
                    } else {
                        $li.click(function() {
                            $(selectNode).find('option').prop('selected', false);
                            setSelected(true);
                        });
                    }

                    $a.click(function (e) {
                        e.preventDefault();
                    });
                    self.$decorUl.append($li);

                });

                $(selectNode).css('display', 'none').after(this.$decorContainer);

                var $form = $(selectNode).parents('form');
                if ($form.length) {
                    $form.bind('reset', function () {
                        $(selectNode).find('option').each(function (i) {
                            if (i == selectNode.default_selected_index) {
                                $(selectNode).find('option').prop('selected', false);
                                $(this).prop('selected', true);
                                this.selected = true;
                                self.$decorButton.find('.text').html($(this).text());
                                $(selectNode).change();
                            }
                        });

                    });
                }

                this.$decorButton.click(function() {
                    setTimeout(
                        function(){
                            self.$decorUl.scrollTop(self.$decorUl.find('.active').index() * self.$decorUl.find('.active').height());
                        },
                        1
                    );
                });
            }
        };


        $.each(this, function () {
            if (this.tagName == 'SELECT') {
                if (!$(this).data('selectDecor')) {
                    var _selectDecor = $.extend({}, SelectDecor);
                    _selectDecor.initialize(this);
                    $.data(this, 'selectDecor', _selectDecor);
                }

            }
        });
    }
})(jQuery);
