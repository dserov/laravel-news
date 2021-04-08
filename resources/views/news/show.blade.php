@extends("layouts.main")

@section("title")
    @parent
    {{ $news['title'] }}
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>{{ $news['title'] }}</h1>
    </div>
    <p>{{ $news['content'] }}</p>
    <p>Категория: <a class="underline" href="{{ route("news::bycategory", ['category' => $news['category_id']]) }}">Перейти в категорию {{ $news['category_id'] }}</a></p>
@endsection
