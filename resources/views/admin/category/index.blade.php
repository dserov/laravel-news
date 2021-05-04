@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">{!! __('labels.categories') !!}</h1>

        <a href="{{route('admin::category::create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-3">{!! __('labels.add_category_title') !!}</a>
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

        @forelse($categories as $item)
            <div class="flex my-6 shadow hover:shadow-lg p-4 bg-white">
                <div class="mr-3 flex-shrink-0">
                    <img src="https://via.placeholder.com/150" alt="{{$item['name']}}">
                </div>
                <div class="flex flex-col">
                    <h2 class="font-bold">{{$item['name']}}</h2>
                    <div>
                        <a href="{{route('admin::category::update', ['category' => $item])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">{!! __('labels.edit_btn_title') !!}</a>
                        <a href="{{route('admin::category::delete', ['category' => $item])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">{!! __('labels.delete_btn_title') !!}</a>
                        <span>{!! __('labels.news_in_category') !!} {{ $item['news']->count() }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">{!! __('labels.categories_not_found') !!}</div>
        @endforelse

    </div>
    {{$categories->links()}}
@endsection
