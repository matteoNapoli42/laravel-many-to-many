@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center align-items-center">
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <span>Hello {{auth()->user()->name}}, {{ __('You are logged in!') }}</span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class=" card mt-3">
                <div class=" card-header">
                    Total registered users
                </div>
                <div class=" card-body">
                    <span>{{$total_users}}</span>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class=" card mt-3">
                <div class=" card-header">
                    Total saved projects
                </div>
                <div class=" card-body">
                    <span>{{$total_projects}}</span>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h1>Your Projects</h1>
        
    </div>
</div>
@endsection
