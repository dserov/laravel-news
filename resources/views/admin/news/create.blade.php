@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            {!! session('success') !!}
        </div>
    @endif
    @if ($errors->any())
        <div class="p-4 border-2 text-indigo-500 text-center">
            <h2 class="font-bold text-xl">Новость не добавлена</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">@if(request()->is('*/create')) Добавить @else Редактировать @endif новость</h1>
        {!! Form::open(['route' => 'admin::news::save']) !!}
            {!! Form::input('hidden', 'news[id]') !!}
            <div class="col-span-6 mb-8">
                {!! Form::label('title', 'Заголовок', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'news[title]', null, ['id' => 'title', 'placeholder' => 'Заголовок ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('source', 'Источник', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'news[source]', null, ['id' => 'source', 'placeholder' => 'Источник URI ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Категория</label>
                <select type="text" name="news[category_id]" id="category_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('spoiler', 'Спойлер', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::textarea('news[spoiler]', null, ['placeholder' => 'Спойлер ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('content', 'Содержание', ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::textarea('news[content]', null, ['placeholder' => 'Полный текст ...', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
            </div>

            <div class="col-span-6 mb-8 flex justify-items-start">
                {!! Form::checkbox('news[is_private]', true, 'news[is_private]', ['id' => 'is_private', 'class' => 'mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                {!! Form::label('is_private', 'Приватная', ['class' => 'ml-3 block text-sm font-medium text-gray-700']) !!}
            </div>

            <div class="px-4 py-3 text-right sm:px-6">
                {!! Form::submit('Сохранить', ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
