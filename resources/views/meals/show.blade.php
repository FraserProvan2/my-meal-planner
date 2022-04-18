@extends('layouts.app')

@section('content')

<h1>Meals</h1>

<div class="row justify-content-center">
    <div class="col-md-7 mb-3">
        <div class="card">
            <div class="card-header bg-secondary h4">{{ __('Update Meal Details') }}</div>
            <div class="card-body"> 
                <form method="post" action="{{ route('meals.update', $meal) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-2">
                        <label for="name">Meal Name</label>
                        <input class="form-control" type="text" placeholder="Meal Name" name="name" value="{{ $meal->name }}" />
                    </div>
                    <div class="form-group mb-2">
                        <label for="steps">Cooking Steps</label>
                        <textarea class="form-control" id="steps" rows="8" name="steps">{{ $meal->steps }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="servings">Servings</label>
                        <select class="form-control" id="sevings" name="servings">
                        <option {{ ($meal->servings == 1) ? 'selected' : '' }}>1</option>
                        <option {{ ($meal->servings == 2) ? 'selected' : '' }}>2</option>
                        <option {{ ($meal->servings == 3) ? 'selected' : '' }}>3</option>
                        <option {{ ($meal->servings == 4) ? 'selected' : '' }}>4</option>
                        <option {{ ($meal->servings == 5) ? 'selected' : '' }}>5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Update Details</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5 mb-3">
        <div class="card">
            <div class="card-header bg-secondary h4">{{ __('Ingredients Used') }}</div>
            <div class="card-body"> 
                <ingredient-picker />
            </div>
        </div>
    </div>
</div>
@endsection
