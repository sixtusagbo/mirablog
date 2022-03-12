@extends('layouts.lead')

@section('keywords')
    <meta name="keywords" content="{{ $post->tags }}">
@endsection

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <div class="d-flex justify-content-between">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                            <div>
                                @auth
                                    @if (Auth::user()->id == $post->user->id)
                                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-info me-2">Modify</a>
                                        <button class="btn btn-danger">Delete</button>
                                    @endif
                                @endauth
                            </div>
                        </div>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->toFormattedDateString() }}
                            by
                            {{ $post->user->name }}</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light"
                            href="">{{ $post->category->name }}</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded"
                            src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $post->body !!}</p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3"
                                    @if (count($post->comments) > 0) placeholder="Join the discussion and leave a comment!" @else placeholder="Be the first to leave a comment!" @endif></textarea>
                            </form>
                            <!-- Comments with replies-->
                            @foreach ($post->comments as $comment)
                                <div class="d-flex mb-3">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">{{ $comment->user->name }}</div>
                                        {{ $comment->content }}
                                        <!-- Replies -->
                                        @if (count($comment->replies) > 0)
                                            @foreach ($comment->replies->sortByDesc('created_at') as $reply)
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                            alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="fw-bold">{{ $reply->user->name }}</div>
                                                        {{ $reply->content }}
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Recent posts widget -->
                <div class="mb-4">
                    <div class="card-header rounded">Recent posts from {{ $post->user->name }}</div>

                    <div class="list-group">
                        @foreach ($recentPostsFromTheAuthor as $post)
                            <a href="/posts/{{ $post->id }}"
                                class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                <img src="https://github.com/twbs.png" alt="{{ $post->user->name }}" width="32"
                                    height="32" class="rounded-circle flex-shrink-0">
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
                    </div>

                </div>

                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>

                    <div class="card-body">
                        @foreach ($categories as $category)
                            <a class="btn btn-primary mb-2"
                                href="/categories/{{ $category->id }}">{{ $category->name }}
                                <span class="badge bg-danger">{{ $category->posts()->count() }}</span></a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
