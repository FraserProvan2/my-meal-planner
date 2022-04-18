@extends('layouts.app')

@section('content')

<h1>Meals</h1>

<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-header bg-secondary h4">{{ __('Create New Meal') }}</div>
            <div class="card-body"> 
                <form method="post" action="{{ route('meals.store') }}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Meal Name</label>
                        <input class="form-control" type="text" placeholder="Meal Name" name="name" />
                    </div>
                    <div class="form-group mb-2">
                        <label for="steps">Cooking Steps</label>
                        <textarea class="form-control" id="steps" rows="8" name="steps"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="servings">Servings</label>
                        <select class="form-control" id="sevings" name="servings">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
