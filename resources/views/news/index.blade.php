@extends("layouts.main")

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Список новостей</h1>
    </div>
    @foreach($news as $new)
        <div class="flex my-6 shadow hover:shadow-lg p-4 bg-white">
            <div class="mr-3 flex-shrink-0">
                @if($new->enclosure)
                    <img src="{{ $new->enclosure }}" alt="{{$new['title']}}" width="150" height="150">
                @else
                    <img src="https://via.placeholder.com/150" alt="{{$new['title']}}">
                @endif
            </div>
            <div class="flex flex-col">
                <h2 class="font-bold text-xl">{{ $new->title }}</h2>
                @auth <span>Приватная: @if($new->is_private) Да @else Нет @endif</span>@endif
                <p>Категория: {{ $new->category->name }}</p>
                <a href="{{ route("news::show", ['news' => $new]) }}" class="underline">Подробнее</a>
            </div>
        </div>
    @endforeach
    {{$news->links()}}
@endsection