@extends("layouts.main")

@section("title")
    @parent
    Приветствие!
@endsection

@section("content")
    <div class="text-center font-bold text-3xl my-6">
        <h1>Инфо про БД!</h1>
        @foreach($db as $key => $value)
            <div class="flex border-2 text-xl">
                <span class="text-indigo-500 mr-4">{{$key}}:</span>
                <pre class="text-indigo-700 text-left">
                    @if(is_array($value))
                        {{print_r($value, true)}}
                    @else
                        {{$value}}
                    @endif
                </pre>
            </div>
        @endforeach
    </div>
@endsection
