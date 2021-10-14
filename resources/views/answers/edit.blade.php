
@extends('layout')

@section('main')

    <div class="col-md-12">
        @include('error')

        <form  method="POST" action="{{route('answer.update', $answer->id)}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer reply </label>
                    <input type="text" class="form-control"  name="content"  value="{{$answer->content}}" placeholder="Enter answer">
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>






@endsection
