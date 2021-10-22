@extends('layout')

@section('title')


    question show
@endsection



@section('main')

    @include('session')



<div class="col-md-12">
   {{-- @if(session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif--}}
    <p>
        {{$question->description}}

    </p>



</div>



<div class="col-md-12">



    <p>  created at: {{$question->created_at}}</p>
</div>

    <a href="{{url("answer/create/{$question->id}")}}" class="btn btn-primary"> Reply</a>
<br>
<br>
@foreach($question->answers as $index => $answer)

    <table class="table table-dark">

        <tbody>

        <tr>
            <div class="col-12">
                <p> answer: # {{ $index }}  {{ $answer->content }}</p>
            </div>
            <br>

        </tr>

        <tr>
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->name == 'marwa mohamed')
            <div class="align-bottom">
            <a href="{{route('answer.edite',$answer->id)}}" class="btn btn-success" role="button"> Edite </a>

            <a href="{{route('delet',$answer->id)}}" class="btn btn-danger" role="button">DELET</a>
            </div>
                @endif
            @endauth
        </tr>

        </tbody>
    </table>


  {{--  <div class="col-12">

        <p> answer: # {{ $index }} => {{ $answer->content }}</p>
    </div>

    <a href="{{route('answer.edite',$answer->id)}}" class="btn btn-success" role="button"> Edite </a>

    <a href="{{route('delet',$answer->id)}}" class="btn btn-danger" role="button">DELET</a>

    <hr>--}}



@endforeach


@endsection
