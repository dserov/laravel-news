@extends("layouts.main")

@section("title")
    @parent
    Список новостей
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Список новостей категории {{ $category->name }}</h1>
    </div>
    @forelse($news as $item)
        <div class="m-4 p-4 bg-gray-200 rounded">
            <h2 class="font-bold text-xl">{{ $item->title }}</h2>
            <a href="{{ route("news::show", ['news' => $item]) }}" class="underline">Подробнее</a>
        </div>
        @empty
            Новостей нет
    @endforelse
@endsection
