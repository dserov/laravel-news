@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            {!! session('success') !!}
        </div>
    @endif
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">@if(request()->is('*/create')) {!! __('labels.add_category_title') !!} @else {!! __('labels.edit_category_title') !!} @endif</h1>
        {!! Form::open(['route' => 'admin::category::save']) !!}
            {!! Form::input('hidden', 'category[id]') !!}
            <div class="col-span-6 mb-8">
                {!! Form::label('category_name', __('labels.category_name'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'category[name]', null, ['id' => 'category_name', 'placeholder' => __('labels.category_name') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('category.name')
                        <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="px-4 py-3 text-right sm:px-6">
                {!! Form::submit(__('labels.save_btn_title'), ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
