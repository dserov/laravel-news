@extends("layouts.main")

@section("title")
    @parent
    Список категорий
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Список категорий</h1>
    </div>
    @forelse($categories as $category)
        <div>
            <a href="{{ route("news::bycategory", ['category' => $category]) }}">{{ $category->name }}</a>
        </div>
    @empty
        Категорий нет
    @endforelse
    {{$categories->links()}}
@endsection
