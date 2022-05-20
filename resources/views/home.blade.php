@extends('layouts.app')

@section('content')

    <div class="title-and-buttons">
        <div>
            <h1>My Plan</h1>
        </div>
        <div class="d-flex flex-grow-1 justify-content-end">
            <div class="generate-meal-plan-menu ms-auto">
                <div class="w-100 mb-1">
                    <a href="{{ route('generate-meal-plan') }}" class="btn btn-success w-100">Generate Meal Plan</a>
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
                <div class="card-body p-0">
                    @if ($plan)
                        <meal-plan plan="{{ json_encode($plan) }}" />
                    @else
                        <div class="text-center">
                            <div class="pt-5">
                                It looks like you don't have a active Meal Plan!
                            </div>
                            <div class="pt-2 pb-5">
                                <a href="{{ route('generate-meal-plan') }}" class="btn btn-lg btn-success px-5">
                                    Generate Meal Plan
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($plan)
        <button type="button" class="btn btn-primary btn-view-shopping-list px-4 mb-2" data-toggle="modal"
            data-target="#shoppingList">
            View Shopping List
        </button>

        <!-- Modal -->
        <div class="modal fade" id="shoppingList" tabindex="-1" role="dialog" aria-labelledby="shoppingListLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title" id="shoppingListLabel">Shopping List</h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            @foreach ($shopping_list as $id => $list_item)
                                @if (is_numeric($list_item['qty']))
                                    <li class="list-group-item text-center">
                                        <div class="ml-2">
                                            <span class="text-primary">{{ $list_item['qty'] }}</span>
                                            {{ $list_item['name'] }}
                                        </div>
                                    </li>
                                @else
                                    <li class="list-group-item text-center">
                                        <div class="ml-2">
                                            <button class="btn btn-sm btn-default text-primary border-primary p-0 px-2"
                                                data-toggle="collapse" data-target="#modal-{{ $id }}"
                                                aria-expanded="false" aria-controls="modal-{{ $id }}">
                                                Custom Metric
                                            </button>

                                            {{ $list_item['name'] }}

                                            <div class="collapse" id="modal-{{ $id }}">
                                                @if (is_array($list_item['qty']))
                                                    @foreach ($list_item['qty'] as $key => $amount)
                                                        {{ $amount }}
                                                        @if (isset($list_item['qty'][$key + 1]))
                                                            ,
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </li>


                                    </li>
                                @endif
                            @endforeach
                        </ul>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
