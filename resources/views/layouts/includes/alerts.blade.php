@if(Session::has('success'))
    <p class="alert alert-success">
        <i class="fa fa-lg fa-check" aria-hidden="true"></i>
        {{ Session::get('success') }}
    </p>
@endif

@if(Session::has('error'))
    <p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif

@if ($errors->any())
    <ul class="alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif