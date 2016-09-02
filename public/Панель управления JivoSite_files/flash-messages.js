$(function() {
    $('.msg .close-button').click(function(e) {
        $(e.target).parent().parent().slideUp('fast');
        $(window).unbind("scroll", onScroll);
        var newPadding = parseInt($(document.body).css('padding-top')) - $(e.target).parent().outerHeight(true);
        $(document.body).css('padding-top', newPadding);
    });

    function onScroll() {
        var offset = $(this).scrollTop();

        if (offset > 0) {
            $('#flash-messages').addClass('fixed');
            $(document.body).css('padding-top', $('#flash-messages').height() + 'px');
        } else {
            $('#flash-messages').removeClass('fixed');
            $(document.body).css('padding-top', '0');
        }
    }

    $(window).bind("scroll", onScroll);

    if ($('.msg .close-button').length > 0) {
        setTimeout(function() {
            $('#flash-messages').slideUp('fast');
            $(window).unbind("scroll", onScroll);
            $(document.body).css('padding-top', '0');
        }, 5000);
    } else {
        $('#submit').click(function(){
            $('#flash-messages').slideUp('fast');
            $(window).unbind("scroll", onScroll);
            $(document.body).css('padding-top', '0');
        });
    }
});