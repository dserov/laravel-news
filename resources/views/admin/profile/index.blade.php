@extends('layouts.admin')

@section('content')
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl text-center font-bold by-3 mb-10">{!! __('labels.users') !!}</h1>

        @can ('create', \App\Models\User::class)
            <a href="{{route('admin::profile::create')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mb-3">{!! __('labels.add_user_title') !!}</a>
        @endcan
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

        @foreach($users as $user)
            <div class="flex my-6 shadow hover:shadow-lg p-4 bg-white">
                <div class="mr-3 flex-shrink-0">
                    <img src="https://via.placeholder.com/80" alt="{{$user->name}}">
                </div>
                <div class="flex flex-col flex-grow">
                    <div>
                        <span>Name: </span>
                        <span class="font-bold">{{$user->name}}</span>
                    </div>
                    <div>
                        <span>Email: </span>
                        <span class="font-bold">{{$user->email}}</span>
                    </div>
                    <div>
                        <span>Administrator: </span>
                        @if($user->is_admin)
                            <span class="font-bold">{{__('labels.yes')}}</span>
                        @else
                            <span class="font-bold">{{ __('labels.no') }}</span>
                        @endif
                    </div>
                </div>
                <div>
                    <a href="{{route('admin::profile::update', ['user' => $user])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">{!! __('labels.edit_btn_title') !!}</a>
                    @can('delete', $user)
                        <a href="{{route('admin::profile::delete', ['user' => $user])}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">{!! __('labels.delete_btn_title') !!}</a>
                    @endcan
                </div>
            </div>
        @endforeach

    </div>
@endsection
