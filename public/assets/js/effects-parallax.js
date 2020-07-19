$(function() {
    $('body').scroll(function() {
        console.log("ddddddd");
        var y = $(document).scrollTop() + $(window).height();
        var largura = $(document).width();
        var parallax = $(".item-parallax");
        parallax.each(function() {
            var obj = $(this);
            var posicao = obj.offset().top + 200;
            if (largura >= 768) {
                if (y >= posicao) {
                    $(this).css({
                        'visibility': 'visible',
                        '-webkit-transform': 'translateY(-20px) scale(0.9)',
                        'transform': 'translateY(0) scale(1)',
                        'opacity': '1',
                        'transition': 'transform 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s'
                    });
                }
            }
        });
    });

    $('.loop').after(function() {
        setTimeout(function() {
            var largura = $(document).width();
            var parallax = $(".item-parallax2");
            parallax.each(function() {
                var obj = $(this);
                var posicao = obj.offset().top + 200;
                if (largura >= 768) {
                    $(this).css({
                        'visibility': 'visible',
                        '-webkit-transform': 'translateY(-20px) scale(0.9)',
                        'transform': 'translateY(0) scale(1)',
                        'opacity': '1',
                        'transition': 'transform 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s'
                    });
                }
            });
        }, 2000);

        setTimeout(function() {
            var largura = $(document).width();
            var parallax_menu = $(".item-parallax3");
            parallax_menu.each(function() {
                var obj = $(this);
                var posicao = obj.offset().top + 200;
                if (largura >= 768) {
                    $(this).css({
                        'visibility': 'visible',
                        '-webkit-transform': 'translateY(-20px) scale(0.9)',
                        'transform': 'translateY(0) scale(1)',
                        'opacity': '1',
                        'transition': 'transform 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s, opacity 0.5s cubic-bezier(0.6, 0.2, 0.1, 1) 0s'
                    });
                }
            });
        }, 1000);
    });
});