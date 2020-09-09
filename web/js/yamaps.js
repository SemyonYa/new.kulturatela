ymaps.ready(function () {
    var myMap = new ymaps.Map('map', {
            center: [56.313668, 44.017117],
            zoom: 16
        }, {
            searchControlProvider: 'yandex#search',
            suppressMapOpenBlock: true
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'Ванеева,13, 2 подъезд,  цокольный этаж',
            balloonContent: 'КУЛЬТУРА ТЕЛА. Студия растяжки и фитнеса'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/web/img/logo.svg',
            // Размеры метки.
            iconImageSize: [150, 98],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-5, -38]
        });

    myMap.geoObjects
        .add(myPlacemark);
    myMap.controls.remove('zoomControl');
    myMap.controls.remove('trafficControl');
    myMap.controls.remove('geolocationControl');
    myMap.controls.remove('typeSelector');
    myMap.controls.remove('fullscreenControl');
    myMap.controls.remove('rulerControl');
    myMap.controls.remove('searchControl');
    // myMap.controls.remove('routeEditor');
    // myMap.controls.remove('routePanelControl');
});