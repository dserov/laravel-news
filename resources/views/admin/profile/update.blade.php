@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="p-4 border-2 text-indigo-500 text-center">
            {!! session('success') !!}
        </div>
    @endif
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">@if(request()->is('*/create')) {!! __('labels.add_user_title') !!} @else {!! __('labels.edit_user_title') !!} @endif</h1>
        {!! Form::open(['route' => 'admin::profile::save']) !!}
            {!! Form::input('hidden', 'id', old('id')) !!}
            <div class="col-span-6 mb-8">
                {!! Form::label('user_name', __('labels.user_name'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'name', old('name'), ['id' => 'user_name', 'placeholder' => __('labels.user_name') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('user_name')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('user_email', __('labels.user_email'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('text', 'email', old('email'), ['id' => 'user_email', 'placeholder' => __('labels.user_email') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('email')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            @can('create', Auth::user())
                <div class="col-span-6 mb-8 flex justify-items-start">
                    <span class="block text-sm font-medium text-gray-700">{!! __('labels.user_is_admin_title') !!}: </span>
                    {!! Form::radio('is_admin', 1, old('is_admin') === 1, ['id' => 'is_admin_yes', 'class' => 'mb-3 ml-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                    {!! Form::label('is_admin_yes', __('labels.yes'), ['class' => 'ml-1 block text-sm font-medium text-gray-700']) !!}
                    {!! Form::radio('is_admin', 0, old('is_admin') === 0, ['id' => 'is_admin_no', 'class' => 'mb-3 ml-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                    {!! Form::label('is_admin_no', __('labels.no'), ['class' => 'ml-1 block text-sm font-medium text-gray-700']) !!}
                    @error('is_admin')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                    @enderror
                </div>
            @endcan

            <div class="col-span-6 mb-8">
                {!! Form::label('user_password', __('labels.user_password'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('password', 'password', '', ['id' => 'user_password', 'placeholder' => __('labels.user_password') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('password')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('user_password_confirmationd', __('labels.user_password_confirmation'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('password', 'password_confirmation', '', ['id' => 'user_password_confirmation', 'placeholder' => __('labels.user_password_confirmation') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('password_confirmation')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="col-span-6 mb-8">
                {!! Form::label('user_current_password', __('labels.user_current_password'), ['class' => 'block text-sm font-medium text-gray-700']) !!}
                {!! Form::input('password', 'current_password', '', ['id' => 'user_current_password', 'placeholder' => __('labels.user_current_password') . ' ...', 'class' => 'p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md']) !!}
                @error('current_password')
                    <div class="bg-red-100 text-red-900 border border-red-900 rounded-md text-sm p-2">{{$message}}</div>
                @enderror
            </div>

            <div class="px-4 py-3 text-right sm:px-6">
                {!! Form::submit(__('labels.save_btn_title'), ['class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
