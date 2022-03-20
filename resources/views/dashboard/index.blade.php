@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('posts.create') }}" class="btn btn-info">Create Post</a>
                        <a href="{{ route('profile') }}" class="btn btn-success">Profile Image</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
