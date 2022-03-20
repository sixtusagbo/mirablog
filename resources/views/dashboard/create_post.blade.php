@extends('layouts.app')

@section('other_styles')
    <link rel="stylesheet" href="{{ asset('vendor/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/tagin@2.0.2/dist/tagin.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-light">{{ __('Create New Post') }}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'posts.store', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group mb-3">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" name="title" id="body" class="form-control" placeholder="Title">
                        </div>

                        <div class="form-group mb-3">
                            <label for="body" class="control-label">Body</label>
                            <textarea name="body" class="summernote"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tags" class="control-label">Tags</label>
                            <input type="hidden" name="tags" class="form-control tagin" value="youtube,video">
                        </div>

                        <div class="form-group mb-3">
                            {{ Form::label('category', 'Category', ['class' => 'control-label']) }}
                            {{ Form::select('category', $categories, null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group mb-3">
                            <label for="cover_image" class="control-label">Cover image</label>
                            <input type="file" name="cover_image" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Create" class="btn btn-dark">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('other_scripts')
    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/summernote-lite.min.js') }}"></script>
    <script src="https://unpkg.com/tagin@2.0.2/dist/tagin.min.js"></script>
    <script>
        $('.summernote').summernote({
            tabsize: 2,
            height: 120,
        }); // summernote

        const tagin = new Tagin(document.querySelector('.tagin'), {
            placeholder: 'Enter a word... (then press comma)'
        })
    </script>
@endsection
