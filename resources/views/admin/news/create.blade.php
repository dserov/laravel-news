@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            {!! session('success') !!}
        </div>
    @endif
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">@if(request()->is('*/create')) {!! __('labels.add_news_title') !!} @else {!! __('labels.add_news_title') !!} @endif</h1>
        {!! Form::open(['route' => 'admin::news::save', 'files' => true]) !!}
            {!! Form::input('hidden', 'news[id]') !!}
            <div class="col-span-6 mb-8">
                {!! Form::label('title', __('labels.news_title'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'news[title]', null, ['id' => 'title', 'placeholder' => __('labels.news_title') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('news.title')
                        <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('source', __('labels.news_source'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'news[source]', null, ['id' => 'source', 'placeholder' => __('labels.news_source') . ' URI ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('news.source')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('category_id', __('labels.news_category_name'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::select('news[category_id]', $categories, null, ['id' => 'category_id', 'class' => 'p-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('news.category_id')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('spoiler', __('labels.news_spoiler'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::textarea('news[spoiler]', null, ['placeholder' => __('labels.news_spoiler') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('news.spoiler')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('content', __('labels.news_content'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::textarea('news[content]', null, ['placeholder' => __('labels.news_content') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('news.content')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8 flex justify-items-start">
                <span class="block text-sm font-medium text-gray-700">{!! __('labels.news_is_private_title') !!}: </span>
                {!! Form::radio('news[is_private]', 1, 'news[is_private]', ['id' => 'is_private_yes', 'class' => 'mb-3 ml-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                {!! Form::label('is_private_yes', __('labels.yes'), ['class' => 'ml-1 block text-sm font-medium text-gray-700']) !!}
                {!! Form::radio('news[is_private]', 0, 'news[is_private]', ['id' => 'is_private_no', 'class' => 'mb-3 ml-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                {!! Form::label('is_private_no', __('labels.no'), ['class' => 'ml-1 block text-sm font-medium text-gray-700']) !!}
                @error('news.is_private')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                <label class="custom-file-label" for="chooseFile">{{ __('labels.enclosure') }}</label>
                <input type="file" name="news[enclosure]" class="custom-file-input" id="chooseFile">
                <span>{{ old('news.enclosure') }}</span>
                @error('news.enclosure')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="px-4 py-3 text-right sm:px-6">
                {!! Form::submit(__('labels.save_btn_title'), ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
