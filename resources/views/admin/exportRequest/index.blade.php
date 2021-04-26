@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">Список запросов на выгрузку</h1>

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

        @forelse($requests as $item)
            <div class="flex my-6 shadow hover:shadow-lg p-4 bg-white">
                <div class="mr-3 flex-shrink-0">
                    <img src="https://via.placeholder.com/150" alt="{{$item['name']}}">
                </div>
                <div class="flex flex-col max-h-36 overflow-hidden relative w-full">
                    <h2 class="font-bold">{{$item['email']}}</h2>
                    @if($item['name']) <p class="flex-grow text-gray-500">Имя: {{$item['name']}}</p>@endif
                    @if($item['phone']) <p class="flex-grow text-gray-500">Телефон: {{$item['phone']}}</p>@endif
                    <p class="flex-grow text-gray-500">{{$item['message']}}</p>
                    <div class="absolute right-1 top-1">
                        <a href="#" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Удалить</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">Запросов на выгрузку нет!</div>
        @endforelse

    </div>
@endsection
