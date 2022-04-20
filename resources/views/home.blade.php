@extends('layouts.app')

@section('content')

<div class="title-and-buttons">
    <div>
        <h1>My Plan</h1>
    </div>
    <div class="d-flex flex-grow-1 justify-content-end">
        <div class="generate-meal-plan-menu ms-auto">
            <div class="w-100 mb-1">
                <a href="" class="btn btn-success w-100">Generate Meal Plan</a>
            </div>
            <div class="mx-1"></div>
            <div class="w-100 mb-2">
                <a href="{{ route('plan-template.create') }}" class="btn btn-secondary w-100">Edit Plan Template</a>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="pt-5">
                        It looks like you don't have a active Meal Plan!
                    </div>
                    <div class="pt-2 pb-5">
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
