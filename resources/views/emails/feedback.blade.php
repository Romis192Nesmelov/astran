@extends('layouts.mail')

@section('content')
    <h2>Обращение с сайта <b>{{ env('APP_NAME') }}</b></h2>
    <h3>От пользователя с именем: <b>{{ $name }}</b></h3>
    <h3>E-mail: {{ $email }}</h3>
    <h3>Телефон: {{ $phone }}</h3>
    <h3>Тема обращения: {{ ['Получить консультацию','Приобрести тариф'][$type-1] }}</h3>
@endsection
