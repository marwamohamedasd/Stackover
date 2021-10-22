@extends('layout')

@section('title')
    edite question
@endsection

@section('main')


    <!-- left column -->
    <div class="col-md-8 m-auto">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @include('error')

            <form  method="POST" action="{{route('question.update',$question->id)}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">

                        <input type="text" name="description"  value="{{$question->description}}" placeholder="Enter Question" style="width:100%">

                    </div>

                    <div class="form-group mb-0">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Tags </label>
                            </div>
                            <select class="custom-select" name="name[]" aria-label="choose tags" multiple>
                                @foreach($tags as $tag)
{{--                                    <option value="{{ $tag->id }}" @if(in_array($tag->id, $tags_ids)) selected @endif> {{$tag->name}}</option>--}}
                                    <option value="{{ $tag->id }}" @if($tag->id == $question->tags()->first()->id) selected @endif> {{$tag->name}}</option>

                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->

    <!--/.col (right) -->
    <!-- /.row -->


@endsection
