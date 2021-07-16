<div class="menu flex">
    <div class="dropdown inline-block relative">
        <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
            <span class="mr-1">Parser</span>
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </button>
        <div class="dropdown-menu absolute hidden text-gray-700 pt-1 flex">
            <a href="{{ route('admin::parser') }}"
               class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2 inline-block w-full">Запланировать парсинг
            </a>
        </div>
    </div>
    @foreach((new \App\Models\Menu())->getAdminMenu() as $item)
        <a href="{{ route($item['alias']) }}"
           class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2">
            {{$item['title']}}
        </a>
    @endforeach
    <div class="dropdown inline-block relative">
        <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
            <span class="mr-1">{{ Auth::user()->name }}</span>
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </button>
        <div class="dropdown-menu absolute hidden text-gray-700 pt-1 flex">
            <a href="{{ route('admin::profile::index') }}"
               class="text-purple-800 bg-gray-300 hover:text-gray-100 hover:bg-purple-800 px-4 py-2 inline-block w-full">
                {{ __('labels.users') }}
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
</div>
