<!doctype html>
<html>
<head>
    <title>Astran</title>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @include('blocks.favicon_block')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <script src="https://api-maps.yandex.ru/2.1/?apikey=fa455148-7970-4574-b087-4f913652328d&lang=ru_RU" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/ajax_form.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.js') }}"></script>
</head>

<body>
{{--<div id="loader"><div></div></div>--}}

<div data-scroll-destination="home">
    @yield('content')
</div>
<footer>
    <div class="container">
        <div>© ООО «Astran», {{ date('Y') }}</div>
        <div>
            <div class="me-5"><a href="#">Правовая информация</a></div>
            <div><a href="#">Политика обработки персональных данных</a></div>
        </div>
    </div>
</footer>

<div id="on-top-button" class="image" data-scroll="home"><img src="{{ asset('images/angle_up.svg') }}" /></div>

<x-modal id="message-modal" head="Сообщение">
    <h4 class="text-center p-4"></h4>
</x-modal>

<x-modal id="feedback-modal" head="Напишите нам">
    <form id="form-feedback-full" class="form" method="post" action="{{ route('feedback') }}">
        @csrf
        <div class="row mb-4">
            <div class="col-md-6 col-sm-12">
                @include('blocks.input_block',[
                    'name' => 'name',
                    'type' => 'text',
                    'label' => 'Как к Вам обращаться?*',
                    'ajax' => true,
                ])
                @include('blocks.input_block',[
                    'name' => 'email',
                    'type' => 'email',
                    'label' => 'E-mail*',
                    'ajax' => true,
                ])
            </div>
            <div class="col-md-6 col-sm-12">
                @include('blocks.input_block',[
                    'name' => 'phone',
                    'type' => 'text',
                    'label' => 'Номер телефона*',
                    'ajax' => true,
                ])
                @include('blocks.select_block',[
                    'name' => 'type',
                    'label' => 'Тип обращения*',
                    'values' => [
                        1 => 'Получить консультацию',
                        2 => 'Приобрести тариф'
                    ],
                    'selected' => 1
                ])
            </div>
        </div>
        @include('blocks.checkbox_block',[
            'name' => 'i_agree',
            'label' => 'Настоящим я даю согласие на обработку моих персональных данных в порядке, установленном Федеральным законом от 27.07.2006 № 152-ФЗ «О персональных данных». '
        ])
        <button class="w-100 mt-3" type="submit">Отправить</button>
    </form>
</x-modal>

</body>
</html>
