@if(count($errors)>0)
    <div class="container mt-3">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container mt-3">
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    </div>

@endif