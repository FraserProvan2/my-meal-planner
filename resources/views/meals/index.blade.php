@extends('layouts.app')

@section('content')

<div class="d-flex">
    <div>
        <h1>Meals</h1>
    </div>
    <div class="d-flex flex-grow-1 justify-content-end">
        <a href="{{ route('meals.create') }}" class="btn btn-success border-dark mb-2 px-5">Add New</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <tbody>
                        @if($meals->count() > 0)
                            @foreach($meals as $meal)    
                                <tr>
                                    <th scope="row">
                                        <div class="pt-1">
                                            <a href="">
                                                {{ $meal->name }}
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="row">
                                        <div class="pt-1">
                                            {{ $meal->servings }} 
                                            <small class="text-muted">Serving(s)</small>
                                        </div>
                                    </th>
                                    <td width="100">
                                        <a class="btn btn-sm btn-info w-100" href="{{ route('meals.show', $meal->id) }}">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td width="100">
                                        <form method="post" action="{{ route('meals.destroy', $meal->id) }}"> 
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                class="btn btn-sm btn-danger w-100" 
                                                type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this meal?')"
                                            ><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center text-danger mt-4 mb-3">No meals Found!</div>
                        @endif
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $meals->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
