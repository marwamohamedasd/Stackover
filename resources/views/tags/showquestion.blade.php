@extends('layout')

@section('main')




    <div class="P-3">
        <h3> {{$tag->name}} Question: </h3>

        @foreach($questions as $question)

            <p> {{$question->description}}</p>
            <p> created at:  {{$question->created_at}}</p>

            <hr>

        @endforeach



{{$questions->links()}}
{{--        {!! $tag->questions->render() !!}--}}
    </div>

@endsection
