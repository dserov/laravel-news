@extends('layouts.main')

@section('title')
    @parent
    Обратная связь
@endsection

@section('content')
    <h1 class="font-bold text-center my-3 text-2xl">Обратная связь</h1>
    {!! Form::open(['route' => 'feedback::save']) !!}
    {!! Form::label('name', 'Имя', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::input('text', 'feedback[name]', null, ['id' => 'name', 'placeholder' => 'Имя...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    {!! Form::label('content', 'Отзыв', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::textarea('feedback[content]', null, ['placeholder' => 'Отзыв...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    {!! Form::submit('Добавить отзыв', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
    {!! Form::close() !!}
@endsection
