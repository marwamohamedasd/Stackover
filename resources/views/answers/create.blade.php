@extends('layout')
@section('title')

  Answer  Reply
@endsection


@section('main')
<div class="col-md-12">
    @include('error')

    <form action="{{ route('answer.store', $question_id) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Answer reply </label>
                <input type="text" class="form-control"  name="content" placeholder="Enter answer">
            </div>


        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>


@endsection


