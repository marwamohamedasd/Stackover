@extends('layout')



@section('title')

    questions
@endsection



@section('main')
@include('session')
<div class="P-3">
<h3> All questions </h3>

    @foreach($questions as $question)

        <p> <a href="{{url("question/show/{$question->id}")}}"> {{$question->description}}    </a>  </p>
        <p> created at:  {{$question->created_at}}</p>


    @auth
        @if (in_array(\Illuminate\Support\Facades\Auth::user()->name , ['marwa mohamed', 'hadeer ahmed']))
        <a href="{{route('question.edite',$question->id)}}" class="btn btn-success" role="button"> Edite </a>
        <a href="{{route('delet.question',$question->id)}}" class="btn btn-danger" role="button">DELET</a>
       @endif


        @endauth

        <hr>

    @endforeach

{{$questions->links()}}
</div>
@endsection

