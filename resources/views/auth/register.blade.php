@extends('layouts.main')

@section('content')
    <h1 class='text-2xl text-center font-bold by-3 mb-10'>{{ __('Sign up') }}</h1>
    <div class="max-w-3xl mx-auto">
        <form class="simple_form new_user" id="new_user" novalidate="novalidate" action="{{ route('register') }}"
              accept-charset="UTF-8" method="post">
            @csrf
            <div class="col-span-6 mb-8">
                <input class="p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('email') is-invalid @enderror"
                       autocomplete="email" autofocus="autofocus"
                       required="required" aria-required="true"
                       placeholder="Email" type="email" value="{{ old('email') }}"
                       name="email" id="user_email"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-span-6 mb-8">
                <input class="p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('password') is-invalid @enderror"
                       autocomplete="new-password"
                       required="required" aria-required="true"
                       placeholder="Password" type="password"
                       name="password" id="password"/>
                <small class="form-text text-muted">6 characters minimum</small>
                @error('password')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-span-6 mb-8 @error('password_confirmation') is-invalid @enderror">
                <input
                        class="p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autocomplete="new-password" required="required"
                        aria-required="true" placeholder="Type your password again" type="password"
                        name="password_confirmation" id="user_password_confirmation"/>
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class='form-actions'>
                <input type="submit" name="commit" value="{{ __('Sign up') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       data-disable-with="Registering"/>
            </div>
        </form>
        <a href="/login">Log in</a>
    </div>

    <div class="mb-3">
        <h2 class="text-2xl text-center font-bold by-3 mb-10 mt-10 ">Вход через соцсети</h2>
        <div class="max-w-3xl mx-auto flex justify-center">
            <a href="{{ route('social::login-vk') }}"
               class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                VKontakte
            </a>
            <a href="{{ route('social::login-facebook') }}"
               class="mr-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Facebook
            </a>
        </div>
    </div>
@endsection
