@extends('layouts.main')

@section('content')
    <div class="big-image first wow animate__animated animate__fadeIn" data-wow-delay=".5s">
        <img id="logo" src="{{ asset('images/logo_white.png') }}" />
        <img id="icon-menu" src="{{ asset('images/icon_menu.svg') }}" />
        <div id="main-menu">
            @foreach($mainMenu as $menu)
                <div class="nav-item" data-scroll="{{ $menu['key'] }}">{{ $menu['name'] }}</div>
            @endforeach
        </div>
    </div>
    <x-section class="while first wow animate__animated animate__fadeIn" data-wow-delay=".5s" data-scroll-destination="about_us" head="О компании">
        <p><strong>ASTRAN</strong> – виртуальный оператор связи, предлагающий комплекс мобильных услуг  и цифровых решений для сегментов B2C и B2B.</p>
        <p>Оператор связи работает на базе сети радиодоступа <strong>Tele2</strong>. ASTRAN имеет свой код сети, выделенную номерную емкость, сим-карты, а также собственную ИТ-платформу, поддерживающую биллинг, процессинг и CRM.</p>
        <p>Виртуальный оператор связи <strong>ASTRAN</strong> действует на основании лицензии №175823 от 09.06.2018, выданной Федеральной службой по надзору в сфере связи, информационных технологий и массовых коммуникаций.</p>
        <div id="line">
            @for($i=0;$i<4;$i++)
                <div class="dot"></div>
            @endfor
        </div>
    </x-section>
    <div class="big-image second wow animate__animated animate__fadeIn" data-wow-delay=".5s">
        <h1>Выбирайте АСТРАН</h1>
    </div>
    <x-section class="while second wow animate__animated animate__fadeIn" data-wow-delay=".5s" data-scroll-destination="tariffs" head="Тарифные планы">
        <x-row>
            @foreach($tariffs as $k => $tariff)
                <div class="col-md-{{ 12/count($tariffs) }} col-sm-12 wow animate__animated animate__fadeIn" data-wow-delay="{{ ($k+1) * 0.7 }}s">
                    <div class="tariff-head">{{ $tariff['name'] }}</div>
                    <div class="tariff-block">
                        <div class="content">
{{--                            <span class="pack">{{ $tariff['pack'] }}</span><br>--}}
                            {!! $tariff['text'] !!}
                        </div>
                        <div class="price">{{ $tariff['price'] }}₽</div>
                        <div class="line"></div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#feedback-modal">Заказать</button>
                    </div>
                </div>
            @endforeach
        </x-row>
    </x-section>
    <x-section class="while third wow animate__animated animate__fadeIn" data-wow-delay=".5s" data-scroll-destination="contacts" head="Контакты">
        <p class="w-100 text-center mb-0">
            127030, г.Москва,<br>
            Новослободская улица, 3<br>
            <strong>ООО «Астран»</strong>
        </p>
    </x-section>
    <x-section class="gray wow animate__animated animate__fadeIn" data-wow-delay=".5s">
        <p>Есть вопросы или предложения? Свяжитесь с нами!</p>
        <button type="button" data-bs-toggle="modal" data-bs-target="#feedback-modal">Написать</button>
    </x-section>
    <div id="map" class="wow animate__animated animate__fadeIn" data-wow-delay=".5s"></div>
@endsection
