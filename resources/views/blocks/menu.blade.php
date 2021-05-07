<div class="menu flex">
    @foreach($menu as $item)
        <a href="{{ route($item['alias']) }}"
           class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2">
            {{$item['title']}}
        </a>
    @endforeach
    @auth
        <a href="{{ route('admin::news::index') }}"
           class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2">{{ __('labels.go_admin_panel') }}</a>
    @endauth
    @guest
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline px-4 py-2">{{ __('labels.login') }}</a>
        <a href="{{ route('register') }}"
           class="text-sm text-gray-700 underline px-4 py-2">{{ __('labels.register') }}</a>
    @endguest
    <div class="flex justify-center rounded-lg text-lg" role="group">
        @foreach( \Config::get('app.locales') as $locale)
            <a href="/lang/{{ $locale }}" class="
            @if($loop->first) bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-r-0 border-blue-500 rounded-l-lg px-3 py-1 mx-0 outline-none focus:shadow-outline
            @elseif($loop->last)
                    bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-l-0 border-blue-500 rounded-r-lg px-3 py-1 mx-0 outline-none focus:shadow-outline
            @else
                    bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-blue-500  px-3 py-1 mx-0 outline-none focus:shadow-outline
            @endif
            ">{{ ucfirst($locale) }}</a>
        @endforeach
    </div>
</div>
