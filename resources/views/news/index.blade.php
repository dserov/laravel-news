@extends("layouts.main")

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Список новостей</h1>
    </div>
    @foreach($news as $new)
        <div class="p-4 m-4 bg-gray-200 rounded ">
            <h2 class="font-bold text-xl">{{ $new['title'] }}</h2>
            <p>Категория: {{ $new['category_id'] }}</p>
            <a href="{{ route("news::show", ['id' => $new['id']]) }}" class="underline">Подробнее</a>
        </div>
    @endforeach
@endsection