<div class="menu flex">
    @foreach($menu as $item)
        <a href="{{ route($item['alias']) }}"
           class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2">
            {{$item['title']}}
        </a>
    @endforeach
    @if (Route::has('auth::login'))
        <div class="px-4 py-2">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
            @else
                <a href="{{ route('auth::login') }}" class="text-sm text-gray-700 underline">Вход</a>
                @if (Route::has('auth::register'))
                    <a href="{{ route('auth::register') }}" class="ml-4 text-sm text-gray-700 underline">Регистрация</a>
                @endif
            @endauth
        </div>
    @endif
    @foreach( \Config::get('app.locales') as $locale)
        <a href="/lang/{{ $locale }}" class="px-2 py-2 m-1">{{ ucfirst($locale) }}</a>
    @endforeach
</div>
