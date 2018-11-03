@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="row">
            <div class="col-md-4"></div>
            <div class="alert alert-danger col-md-4 text-center">
                {{$error}}
            </div>
            <div class="col-md-4"></div>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="row">
        <div class="col-md-4"></div>
        <div class="alert alert-success col-md-4 text-center">
            {{session('success')}}
        </div>
        <div class="col-md-4"></div>
    </div>

@endif

@if(session('error'))

    <div class="row">
        <div class="col-md-4"></div>
        <div class="alert alert-danger col-md-4 text-center">
            {{session('error')}}
        </div>
        <div class="col-md-4"></div>
    </div>
@endif