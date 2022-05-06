@extends('layouts.app')

@section('content')

    <h1>Your Plan Template</h1>

    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body p-0">
                    <plan-template-editor 
                        template="{{ json_encode($template) }}"
                    />
                </div>
            </div>
        </div>
    </div>

@endsection
