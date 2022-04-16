@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">{{ __('Ingredients') }}</div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <tbody>
                        @foreach($ingredients as $ingredient)    
                            <tr>
                                <th scope="row">
                                    <div class="pt-1">{{ $ingredient->name }}</div>
                                </th>
                                <td>
                                    <button class="btn btn-sm btn-primary w-100">Edit</button>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger w-100 ">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $ingredients->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Add New') }}</div>

            <div class="card-body">
                form ere
            </div>
        </div>
    </div>
</div>
@endsection
