@if(Session::has('success'))
    <div class="alert alert-success" role="alert" style="text-align: center">
        <strong>Success:</strong> {{ Session::get('success') }}
    </div>
@endif


@if(count($errors)>0)
    <div class="alert alert-danger" role="alert" style="text-align: center">
        <strong>Errors:</strong>
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
    </div>
@endif