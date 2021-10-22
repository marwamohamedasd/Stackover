@extends('layout')

@section('title')
    create question
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

                        <form method="POST" action="{{url('question/store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">

                                    <input type="text" name="description"  placeholder="Enter Question" style="width:100%">

                                </div>

                                <div class="form-group mb-0">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Tags </label>
                                        </div>
                                        <select class="custom-select" name="name[]" aria-label="choose tags" multiple>
                                            @foreach($tags as $tag)
                                            <option value="{{$tag->id}}"> {{$tag->name}}</option>

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
