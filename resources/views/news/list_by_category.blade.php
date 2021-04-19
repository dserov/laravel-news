@extends("layouts.main")

@section("title")
    @parent
    Список новостей
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Список новостей категории {{ current($news)['category_id'] }}</h1>
    </div>
    @forelse($news as $new)
        <div class="m-4 p-4 bg-gray-200 rounded">
            <h2 class="font-bold text-xl">{{ $new['title'] }}</h2>
            <p>Категория: {{ $new['category_id'] }}</p>
            <a href="{{ route("news::show", ['id' => $new['id']]) }}" class="underline">Подробнее</a>
        </div>
        @empty
            Новостей нет
    @endforelse
@endsection
