@extends('layouts.app')

@section('content')

    <h1>Ingredients</h1>

    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <tbody>
                            @if ($ingredients->count() > 0)
                                @foreach ($ingredients as $ingredient)
                                    <tr>
                                        <th scope="row">
                                            <div class="pt-1">{{ $ingredient->name }}</div>
                                        </th>
                                        <td width="100">
                                            <a class="btn btn-sm btn-info w-100"
                                                href="{{ route('ingredients.show', $ingredient->id) }}">
                                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td width="100">
                                            <form method="post"
                                                action="{{ route('ingredients.destroy', $ingredient->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger w-100" type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this Ingredient?')"><i
                                                        class="fa fa-trash fa-lg" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @include('layouts.includes.missing-notice', ['label' => 'Ingredients'])
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
                <div class="card-header bg-secondary h4">{{ __(isset($toEdit) ? 'Update' : 'Add New') }}</div>

                <div class="card-body">
                    @if (isset($toEdit))
                        <form method="post" action="{{ route('ingredients.update', $toEdit->id) }}">
                            @csrf
                            @method('PATCH')
                            <input class="form-control form-control-lg" type="text" name="name"
                                placeholder="Ingredient Name" value="{{ $toEdit ? $toEdit->name : '' }}" />
                            <button class="btn btn btn-success form-control mt-2" type="submit">Update</button>
                        </form>
                    @else
                        <form method="post" action="{{ route('ingredients.store') }}">
                            @csrf
                            <input class="form-control form-control-lg" type="text" name="name"
                                placeholder="Ingredient Name" />
                            <button class="btn btn btn-success form-control mt-2" type="submit">Add</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
