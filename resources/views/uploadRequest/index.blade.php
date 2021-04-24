@extends('layouts.main')

@section('title')
    @parent
    Запрос выгрузки
@endsection

@section('content')
    <h1 class="font-bold text-center my-3 text-2xl">Запрос выгрузки</h1>
    @if (Session::has('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">{{Session::get('success')}}</div>
    @endif
    {!! Form::open(['route' => 'uploadRequest::save']) !!}
    {!! Form::label('name', 'Имя', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::input('text', 'upload[name]', null, ['id' => 'name', 'placeholder' => 'Имя...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    {!! Form::label('phone', 'Телефон', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::input('text', 'upload[phone]', null, ['id' => 'phone', 'placeholder' => 'Телефон...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    {!! Form::label('email', 'Email', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::input('text', 'upload[email]', null, ['id' => 'email', 'placeholder' => 'Email...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    {!! Form::label('message', 'Чего желаете?', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::input('text', 'upload[message]', null, ['id' => 'message', 'placeholder' => 'Что интересует?...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}

    {!! Form::submit('Отправить', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
    {!! Form::close() !!}
@endsection
