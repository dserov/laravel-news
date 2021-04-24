@extends('layouts.main')

@section('content')
    @if(session('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            <h2 class="font-bold text-xl">{!! session('success') !!}</h2>
        </div>
    @else
        @if ($errors->any())
            <div class="p-4 border-2 text-indigo-500 text-center">
                <h2 class="font-bold text-xl">Запрос не добавлен</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="max-w-3xl mx-auto">
            <h1 class="text-2xl text-center font-bold by-3 mb-10">Запрос на выгрузку</h1>
            {!! Form::open(['route' => 'exportRequest::save']) !!}
            <div class="col-span-6 mb-8">
                {!! Form::label('name', 'Ваше имя', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'export[name]', null, ['id' => 'name', 'placeholder' => 'Ваше имя ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('phone', 'Ваш телефон', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'export[phone]', null, ['id' => 'phone', 'placeholder' => 'Ваш телефон ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('email', 'Ваша почта', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'export[email]', null, ['id' => 'email', 'placeholder' => 'Ваша почта ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('message', 'Что интересует?', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::textarea('export[message]', null, ['placeholder' => 'Ваше пожелание ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="px-4 py-3 text-right sm:px-6">
                {!! Form::submit('Сохранить', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    @endif
@endsection
