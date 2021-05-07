@extends('layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto">
        <h1 class='text-2xl text-center font-bold by-3 mb-10'>Log in</h1>
        <form class="simple_form new_user" id="new_user" novalidate="novalidate" action="{{ route('login') }}"
              accept-charset="UTF-8" method="post">
            @csrf
                <div class="col-span-6 mb-8">
                    <label class="block text-sm font-medium text-gray-700"
                           for="user_email">Email</label>
                    <input class="p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md' @error('email') is-invalid @enderror"
                           autocomplete="email" autofocus="autofocus"
                           type="email" value="{{ old('email') }}" name="email" id="user_email"/>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-span-6 mb-8">
                    <label class="block text-sm font-medium text-gray-700"
                           for="user_password">Password</label>
                    <input
                            class="p-2 mb-3 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md' @error('password') is-invalid @enderror"
                            autocomplete="current-password" type="password"
                            name="password" id="user_password"/>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <fieldset class="col-span-6 mb-8">
                    <div class="form-check">
                        <input name="remember" type="hidden" value="0"/>
                        <input class="form-check-input boolean optional" type="checkbox" value="1" name="remember"
                               id="user_remember" {{ old('remember') ? 'checked' : '' }}/>
                        <label class="form-check-label boolean optional"
                               for="user_remember">Remember me</label>
                    </div>
                </fieldset>
            <div class='px-4 py-3 text-right sm:px-6'>
                <input type="submit" name="commit" value="Log in" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       data-disable-with="Log in"/>
            </div>
        </form>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Sign up</a>
        @endif
        <br>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
    </div>
    <span>User:: login: q@q.ru password:1</span><br>
    <span>Admin::login: dserov@gmail.com password:1</span>
@endsection
