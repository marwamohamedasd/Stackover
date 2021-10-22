@extends('layout')
@section('main')

    <h2> All Tags </h2>





<div class="container-lg my-5 ">
    <div class="row">
        @foreach($tags as $tag)
        <div class="col-sm-6 col-lg-3 mb-2">
            <div class="p-5 bg-primary text-light">

            <a href="{{route('tag.show',$tag->id)}}"><h3>{{$tag->name }}</h3></a>
            </div>
        </div>

        @endforeach
    </div>
</div>



{{--
<div class="container-lg my-5">

    <h2> bassic gride</h2>

    <div class="row">

        <div class="col">
            <div class="p-5 bg-primary text-light"> col 1</div>
        </div>

        <div class="col">
            <div class="p-5 bg-primary text-light"> col 2</div>
        </div>
        <div class="col">
            <div class="p-5 bg-primary text-light"> col 3</div>
        </div>




    </div>


--}}







@endsection
