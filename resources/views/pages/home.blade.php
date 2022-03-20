@extends('layouts.lead')

@section('keywords')
    <meta name="keywords" content="{{ $keywords }}">
@endsection

@section('content')

    <!-- Page header with logo and tagline-->
    <header class="py-2 bg-light mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to {{ config('app.name', 'Mirablog') }}!</h1>
                <p class="lead mb-0">All through Laravel course project website</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Blog posts-->
                <div class="row">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <div class="col-lg-6">
                                <!-- Blog post-->
                                <div class="card mb-4">
                                    <a href="/posts/{{ $post->id }}"><img class="card-img-top"
                                            src="{{ asset('storage/images/post_covers/' . $post->cover_image) }}"
                                            alt="..." /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ $post->created_at->toDayDateTimeString() }}</div>
                                        <h2 class="card-title h4">{{ $post->title }}</h2>
                                        <p class="card-text">{!! substr($post->body, 0, 20) . '...' !!}</p>
                                        <a class="btn btn-primary" href="/posts/{{ $post->id }}">Read more →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Pagination-->
                        <hr class="my-2" />
                        <div class="d-flex justify-content-center">{{ $posts->links() }}</div>
                    @else
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">No posts found!</div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-light">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" id="search-field" type="text"
                                placeholder="Enter search term..." />
                            <button class="btn btn-primary" id="search-button" type="button">Go!</button>
                        </div>
                        <em class="text-danger" id="error-hint">Please enter a value...</em>
                    </div>
                </div>

                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-light">Categories</div>

                    <div class="card-body">
                        @foreach ($categories as $category)
                            <a class="btn btn-primary mb-2" href="/categories/{{ $category->id }}">{{ $category->name }}
                                <span class="badge bg-danger">{{ $category->posts()->count() }}</span></a>
                        @endforeach
                    </div>
                </div>

                <!-- Recent posts widget -->
                <div class="mb-4">
                    <div class="card-header rounded bg-dark text-light">Recent Posts</div>

                    <div class="list-group">
                        @if (count($posts) > 0)
                            @foreach ($recentPosts as $post)
                                <a href="/posts/{{ $post->id }}"
                                    class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    <img src="{{ asset('storage/images/profile/' . $post->user->profile_image) }}"
                                        alt="{{ $post->user->name }}" width="32" height="32"
                                        class="rounded-circle flex-shrink-0">
                                    <div class="d-flex gap-2 w-100 justify-content-between">
                                        <div>
                                            <h6 class="mb-0">{{ $post->title }}</h6>
                                            <p class="mb-0 opacity-75">{!! substr($post->body, 0, 9) . '...' !!}</p>
                                        </div>
                                        <small
                                            class="opacity-50 text-nowrap">{{ $post->created_at->diffForHumans(['options' => Carbon\Carbon::JUST_NOW | Carbon\Carbon::ONE_DAY_WORDS]) }}</small>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="alert alert-success" role="alert">No posts found!</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('other_scripts')
    <script src="{{ asset('vendor/jquery.min.js') }}"></script>
    <script>
        $('#error-hint').hide();

        function processSearch() {
            if ($('#search-field').val() == '') {
                $('#error-hint').show();
            } else {
                location.href = '/posts/find/' + $('#search-field').val();
            }
        }

        $('#search-button').click(function(e) {
            processSearch();
        });

        $('#search-field').keyup(function(e) {
            if (e.keyCode == 13) {
                // enter key press
                processSearch();
            }
        });
    </script>
@endsection
