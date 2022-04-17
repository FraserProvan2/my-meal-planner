@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header">{{ __('Your Current Plan') }}</div>

            <div class="card-body">
                weekly plan here

                <button class="btn btn-lg btn-success">
                    Generate
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
