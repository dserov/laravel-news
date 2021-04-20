@extends('layouts.main')

@section('title')
    @parent
    Обратная связь
@endsection

@section('content')
    <h1 class="font-bold text-center my-3 text-3xl">Обратная связь</h1>
    <table class="mx-auto">
        <tr>
            <th class="mr-3 border-black border">Имя</th>
            <th class="mr-3 border-black border">Отзыв</th>
        </tr>
    @forelse($feedbacks as $feedback)
        <tr>
            <td class="mr-3 border-black border">{{$feedback['name']}}</td>
            <td class="border-black border">{{$feedback['content']}}</td>
        </tr>
        @empty
        <tr>
            <td colspan="2">Отзывов пока нет</td>
        </tr>
    @endforelse
        </table>

    <hr class="my-4">
    <h2 class="text-2xl text-center my-3 font-bold">Новый отзыв</h2>
    @if(Session::has('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            {!! Session::get('success') !!}}
        </div>
    @endif
    @if(Session::has('errors'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            <h2 class="font-bold text-xl">Отзыв не добавлен</h2>
            {!! implode(', ', Session::get('errors')) !!}
        </div>
    @endif
    {!! Form::open(['route' => 'feedback::save']) !!}
    {!! Form::label('name', 'Имя', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::input('text', 'feedback[name]', null, ['id' => 'name', 'placeholder' => 'Имя...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    {!! Form::label('content', 'Отзыв', ['class' => 'block text-sm font-medium text-gray-700']) !!}
    {!! Form::textarea('feedback[content]', null, ['placeholder' => 'Отзыв...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
    {!! Form::submit('Добавить отзыв', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
    {!! Form::close() !!}
@endsection
