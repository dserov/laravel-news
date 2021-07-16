@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">{!! __('labels.news_list') !!}</h1>

        <a href="{{route('admin::news::create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-3">{!! __('labels.news_add_new') !!}</a>
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
                    @if($item->enclosure)
                        <img src="{{ $item->enclosure }}" alt="{{ $item->title }}" width="150" height="150">
                    @else
                        <img src="https://via.placeholder.com/150" alt="{{ $item->title }}">
                    @endif
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold">{{$item['title']}}</h2>
                    <p class="flex-grow text-gray-500">{!! __('labels.category') !!}: {{$item->category->name}}</p>
                    <p class="flex-grow max-h-20 overflow-hidden">{{$item['spoiler']}}</p>
                    <div>
                        <a href="{{route('admin::news::update', ['news' => $item])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">{!! __('labels.edit_btn_title') !!}</a>
                        <a href="{{route('admin::news::delete', ['news' => $item])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">{!! __('labels.delete_btn_title') !!}</a>
                        <span>{!! __('labels.news_is_private_title') !!}: @if($item['is_private']) {!! __('labels.yes') !!} @else {!! __('labels.no') !!} @endif</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">{!! __('labels.news_not_found') !!}</div>
        @endforelse

    </div>
    {{$news->links()}}
@endsection
