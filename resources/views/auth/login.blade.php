@extends("layouts.main")

@section("title")
    @parent
    Авторизация
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Авторизация</h1>
    </div>
    <form action="{{ route("auth::login") }}" method="post">
        <label>Login <input type="text" name="login" placeholder="login"></label>
        <label>Password <input type="password" name="password" placeholder="password"></label>
        <button type="submit">Войти</button>
    </form>
@endsection
