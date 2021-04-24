@extends('layouts.main')


@section('content')
    <h1 class="text-2xl text-center font-bold by-3">Список новостей</h1>

    <a href="{{route('admin::news::create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Добавить новость</a>
@endsection
