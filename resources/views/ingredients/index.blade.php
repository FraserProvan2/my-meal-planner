@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 mb-3">
        <div class="card">
            <div class="card-header bg-secondary h4">{{ __('Ingredients') }}</div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <tbody>
                        @if($ingredients->count() > 0)
                            @foreach($ingredients as $ingredient)    
                                <tr>
                                    <th scope="row">
                                        <div class="pt-1">{{ $ingredient->name }}</div>
                                    </th>
                                    <td width="100">
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('ingredients.show', $ingredient->id) }}">Edit</a>
                                    </td>
                                    <td width="100">
                                        <form method="post" action="{{ route('ingredients.destroy', $ingredient->id) }}"> 
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                class="btn btn-sm btn-danger w-100" 
                                                type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this Ingredient?')"
                                            >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center text-danger mt-4 mb-3">No Ingredients Found!</div>
                        @endif
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $ingredients->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-header bg-secondary h4">{{ __('Add New') }}</div>

            <div class="card-body">
                @if(isset($ingreident))
                    <form method="post" action="{{ route('ingredients.update', $ingreident->id) }}">
                        @csrf
                        @method('PATCH')
                        <input 
                            class="form-control form-control-lg" 
                            type="text" 
                            name="name" 
                            placeholder="Ingredient Name" 
                            value="{{ ($ingreident) ? $ingreident->name : '' }}" 
                        />
                        <button class="btn btn btn-success form-control mt-2" type="submit">Update</button>
                    </form>
                @else
                    <form method="post" action="{{ route('ingredients.store') }}">
                        @csrf
                        <input 
                            class="form-control form-control-lg" 
                            type="text" 
                            name="name" 
                            placeholder="Ingredient Name"
                        />
                        <button class="btn btn btn-success form-control mt-2" type="submit">Add</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
