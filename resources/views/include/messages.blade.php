@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert_danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert_success">
        {{session('success')}}
    </div>
    {{-- <div class="alert alert-success">
        {{session('success')}}
    </div> --}}
@endif

@if(session('error'))
    <div class="alert_danger">
        {{session('error')}}
    </div>
    {{-- <div class="alert alert-danger">
        {{session('error')}}
    </div> --}}
@endif
