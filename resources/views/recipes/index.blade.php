@extends('layouts.app')

@section('content')

<div class="d-flex">
    <div>
        <h1>Recipes</h1>
    </div>
    <div class="d-flex flex-grow-1 justify-content-end">
        <a href="" class="btn btn-success border-dark mb-2 px-5">Add New</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-12 mb-3">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <tbody>
                        @if($recipes->count() > 0)
                            @foreach($recipes as $recipe)    
                                <tr>
                                    <th scope="row">
                                        <div class="pt-1">{{ $recipe->name }}</div>
                                    </th>
                                    <td width="100">
                                        <a class="btn btn-sm btn-primary w-100" href="{{ route('recipes.show', $recipe->id) }}">Edit</a>
                                    </td>
                                    <td width="100">
                                        <form method="post" action="{{ route('recipes.destroy', $recipe->id) }}"> 
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                class="btn btn-sm btn-danger w-100" 
                                                type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this Recipe?')"
                                            >Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center text-danger mt-4 mb-3">No Recipes Found!</div>
                        @endif
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $recipes->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
