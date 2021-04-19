@extends("layouts.main")

@section("title")
    @parent
    Новая новость
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Новая новость</h1>
    </div>
    <form action="{{ route("news::add_new") }}" method="post">
        <label>Title <input type="text" name="title" placeholder="title"></label>
        <label>Category
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
        </label>
        <button type="submit">Сохранить</button>
    </form>
@endsection
