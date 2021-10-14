@if(session('success') !==null)
<div class="alert alert-success">

    {{session('success')}}

</div>


@endif


@if(session('answer') !==null)
    <div class="col-md-8 alert alert-default-primary">

        {{session('answer')}}

    </div>


@endif
