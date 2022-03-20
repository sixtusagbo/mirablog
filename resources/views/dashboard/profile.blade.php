@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Edit profile image') }}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'updateProfileImage', 'enctype' => 'multipart/form-data']) !!}
                        <input type="file" name="profile_image">

                        <input type="submit" value="Submit" class="btn btn-dark">
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
