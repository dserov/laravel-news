@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">Список новостей</h1>

        <a href="{{route('admin::news::create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-3">Добавить новость</a>
        @if(Session::has('success'))
            <div class="p-4 border-2 text-indigo-500 text-center">
                {!! Session::get('success') !!}
            </div>
        @endif
        @if ($errors->any())
            <div class="p-4 border-2 text-indigo-500 text-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @forelse($news as $item)
            <div class="flex my-6 shadow hover:shadow-lg p-4 bg-white">
                <div class="mr-3 flex-shrink-0">
                    <img src="https://via.placeholder.com/150" alt="{{$item['title']}}">
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold">{{$item['title']}}</h2>
                    <p class="flex-grow text-gray-500">Категория: {{$item->category->name}}</p>
                    <p class="flex-grow">{{$item['spoiler']}}</p>
                    <div>
                        <a href="{{route('admin::news::update', ['news' => $item])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Изменить</a>
                        <a href="{{route('admin::news::delete', ['news' => $item])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Удалить</a>
                        <span>Приватная: @if($item['is_private']) Да @else Нет @endif</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">Новостей пока нет!</div>
        @endforelse

    </div>
@endsection
