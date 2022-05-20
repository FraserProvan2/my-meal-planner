@extends('layouts.app')

@section('content')

    <h1>Meals</h1>

    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header bg-secondary h4">{{ __('Update Meal Details') }}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('meals.update', $meal) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group mb-2">
                            <label for="name">Meal Name</label>
                            <input class="form-control" type="text" placeholder="Meal Name" name="name"
                                value="{{ $meal->name }}" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="steps">Cooking Steps</label>
                            <textarea class="form-control" id="steps" rows="8" name="steps">{{ $meal->steps }}</textarea>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="in-breakfast" name="in_breakfast"
                                {{ $meal->in_breakfast == 1 ? ' checked' : '' }}>
                            <label class="form-check-label" for="in-breakfast">Include in Breakfast</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="in-lunch" name="in_lunch"
                                {{ $meal->in_lunch == 1 ? ' checked' : '' }}>
                            <label class="form-check-label" for="in-lunch">Include in Lunch</label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="in-dinner" name="in_dinner"
                                {{ $meal->in_dinner == 1 ? ' checked' : '' }}>
                            <label class="form-check-label" for="in-dinner">Include in Dinner</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update Details</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <ingredient-picker :meal="{{ $meal }}" />
        </div>
    </div>
@endsection
