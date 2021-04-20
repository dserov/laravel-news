@extends('layouts.main')


@section('content')
    @if (Session::has('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">{{Session::get('success')}}</div>
    @endif
    {!! Form::open(['route' => 'admin::news::save']) !!}
    {{--<form action="{{route('admin::news::create')}}" method="post">--}}
        <div class="col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700">Заголовок</label>
            <input type="text" name="news[title]" id="title" autocomplete="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="col-span-6">
            <label for="content" class="block text-sm font-medium text-gray-700">Содержание</label>
            <input type="text" name="news[content]" id="content" autocomplete="content" cols="50" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Send
            </button>
        </div>
    {!! Form::close() !!}
@endsection
