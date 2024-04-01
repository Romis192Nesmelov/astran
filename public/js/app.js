$(document).ready(function() {
    $('input[name=phone]').mask("+7(999)999-99-99");

    new WOW().init();

    ymaps.ready(() => {
        mapInit();
    });

    const mainMenu = $('#main-menu'),
        iconMenu = $('#icon-menu');

    window.menuOpenFlag = false;
    window.menuAnimationFlag = false;

    // setTimeout(() => {
        // window.scrollTo(0, 0);
        mainMenu.css('right','-25%');
        windowResize();
        showHideOnTop();
        // $('#loader').remove();
    // }, 500);

    $(window).on('resize', () => {
        windowResize();
        showHideOnTop();
    });

    iconMenu.click(function () {
        openCloseMainMenu(mainMenu, iconMenu);
    });

    $('.big-image, .section').click(function () {
        if (window.menuOpenFlag) openCloseMainMenu(mainMenu, iconMenu);
    });

    //Glow dots
    let glowPos = 0,
        dots = $('#line .dot');

    setInterval(() => {
        dots.removeClass('glow');
        $(dots[glowPos]).addClass('glow');
        glowPos++;
        if (glowPos === dots.length) glowPos = 0;
    }, 700);

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll]').click(function (e) {
        e.preventDefault();
        if (!window.menuScrollFlag) {
            $(this).addClass('active');
            gotoScroll($(this).attr('data-scroll'));
        }
    });

    // Scroll controls
    setTimeout(function () {
        windowScroll();
        // fixingMainMenu($(window).scrollTop());
    }, 1000);
});

const windowScroll = () => {
    $(window).scroll(function() {
        let win = $(this);
        window.menuScrollFlag = true;
        $('.section').each(function () {
            let scrollData = $(this).attr('data-scroll-destination');
            if (!win.scrollTop()) {
                resetColorHrefsMenu();
                window.menuScrollFlag = false;
            } else if ($(this).offset().top <= win.scrollTop()+200 && scrollData) {
                window.menuScrollFlag = false;
                resetColorHrefsMenu();
                $('a[data-scroll=' + scrollData + ']').parents('.nav-item').addClass('active');
            }
        });
        showHideOnTop();
    });
}

const resetColorHrefsMenu = () => {
    $('.nav-item').removeClass('active').blur();
}

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top
    }, 1500, 'easeInOutQuint');
}

const tolocalstring = (string) => {
    return string.toLocaleString().replace(/\,/g, ' ');
}

const windowResize = () => {
    const bigImages = $('.big-image');
    if ($(window).width() >= 991) {
        bigImages.css('height',$(window).height());
    } else {
        bigImages.css('height',480);
    }
}

const showHideOnTop = () => {
    const onTopButton = $('#on-top-button');
    if ($(window).scrollTop() > $(window).height()) {
        onTopButton.fadeIn();
    } else onTopButton.fadeOut();
}

const openCloseMainMenu = (mainMenu, iconMenu) => {
    mainMenu.animate({'right':(window.menuOpenFlag ? '-25%' : 0)},'fast',() => {
        if (!menuAnimationFlag) {
            window.menuAnimationFlag = true;
            if (!window.menuOpenFlag) {
                window.menuOpenFlag = true;
                iconMenu.attr('src', '/images/icon_cross.svg');
                window.menuAnimationFlag = false;
            } else {
                window.menuOpenFlag = false;
                iconMenu.attr('src', '/images/icon_menu.svg');
                window.menuAnimationFlag = false;
            }
        }
    });
}

const mapInit = () => {
    let myMap = new ymaps.Map("map", {
        center: [55.779155, 37.600594],
        zoom: 15,
        controls: []
    }),
        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        // Создаем метку с помощью вспомогательного класса.
        placemark = new ymaps.Placemark([55.779155, 37.600594], {
            // Свойства.
            // Содержимое хинта.
            hintContent: 'ООО «Астран»'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#imageWithContent',
            // Своё изображение иконки метки.
            iconImageHref: '../images/placemark.png',
            // Размеры метки.
            iconImageSize: [150, 150],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-70, -130],
            // Смещение слоя с содержимым относительно слоя с картинкой.
            iconContentOffset: [0, 0],
            // Макет содержимого.
            iconContentLayout: MyIconContentLayout
        });

    myMap.geoObjects.add(placemark);
}
