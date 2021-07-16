<div class="menu flex">
    @foreach($menu as $item)
        <a href="{{ route($item['alias']) }}"
           class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2">
            {{$item['title']}}
        </a>
    @endforeach
    @auth
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin::news::index') }}"
               class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2">{{ __('labels.go_admin_panel') }}
            </a>
        @endif
    @endauth
    @guest
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline px-4 py-2">{{ __('labels.login') }}</a>
        <a href="{{ route('register') }}"
           class="text-sm text-gray-700 underline px-4 py-2">{{ __('labels.register') }}</a>
    @endguest
    @auth
        <div class="dropdown inline-block relative">
            <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
                <span class="mr-1">{{ Auth::user()->name }}</span>
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </button>
            <div class="dropdown-menu absolute hidden text-gray-700 pt-1 flex">
                    <a href="{{ route('profile::update') }}"
                       class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2 inline-block w-full">Профиль
                    </a>
                    <a class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2 inline-block w-full"
                       rel="nofollow"
                       href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='fe fe-log-out'></i>
                        Log out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div>
    @endauth
    <div class="flex justify-center rounded-lg text-lg" role="group">
        @foreach( \Config::get('app.locales') as $locale)
            <a href="/lang/{{ $locale }}" class="
            @if($loop->first)
                    bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-r-0 border-blue-500 rounded-l-lg px-3 py-1 mx-0 outline-none focus:shadow-outline
            @elseif($loop->last)
                    bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-l-0 border-blue-500 rounded-r-lg px-3 py-1 mx-0 outline-none focus:shadow-outline
            @else
                    bg-white text-blue-500 hover:bg-blue-500 hover:text-white border border-blue-500  px-3 py-1 mx-0 outline-none focus:shadow-outline
            @endif
            ">{{ ucfirst($locale) }}</a>
        @endforeach
    </div>
</div>
