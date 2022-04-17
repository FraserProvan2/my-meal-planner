@extends('layouts.app')

@section('content')
<h1>My Plan</h1>
<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="pt-4">
                        It looks like you don't have a active Meal Plan!
                    </div>
                    <div class="pt-2 pb-4">
                        <button class="btn btn-lg btn-success px-5">
                            Generate Meal Plan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
