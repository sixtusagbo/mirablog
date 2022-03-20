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
                            <div>
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Posted on
                                    {{ $post->created_at->toFormattedDateString() }}
                                    by
                                    {{ $post->user->name }}</div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light"
                                    href="">{{ $post->category->name }}</a>
                            </div>

                            <div>
                                @auth
                                    @if (Auth::user()->id == $post->user->id)
                                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-info mb-2">Modify</a>
                                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'class' => 'form-inline']) !!}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        {!! Form::close() !!}
                                    @endif
                                @endauth
                            </div>
                        </div>

                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><img class="img-fluid rounded"
                            src="{{ asset('storage/images/post_covers/' . $post->cover_image) }}" alt="Cover Image" />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4">{!! $post->body !!}</p>
                    </section>
                </article>
                <!-- Comments section-->
                <section class="mb-5">
                    <div class="card bg-light">
                        <h5 class="card-header bg-dark text-light">Comments</h5>
                        <div class="card-body">
                            @auth
                                <!-- Comment form-->
                                {!! Form::open(['route' => 'comments.store']) !!}

                                <div class="row">
                                    <div class="col-lg-11">
                                        <textarea name="content" class="form-control" rows="3"
                                            @if (count($post->comments) > 0) placeholder="Join the discussion and leave a comment!" @else placeholder="Be the first to leave a comment!" @endif></textarea>
                                    </div>
                                    <div class="col-lg-1 pt-3">
                                        <button type="submit"
                                            class="btn btn-outline-dark rounded-circle text-center">&#62;</button>
                                        <p class="fw-bold">Send</p>
                                    </div>
                                    {!! Form::hidden('post_id', $post->id) !!}
                                </div>
                                {!! Form::close() !!}
                            @else
                                <div class="alert alert-info mb-0">
                                    <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Sign
                                        Up</a> to join the discussion!
                                </div>
                            @endauth
                            <!-- Comments with replies-->
                            @foreach ($post->comments as $comment)
                                <div class="d-flex mb-0 mt-3">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false"
                                                style="text-decoration: none; font-weight: 600; color: #000;">
                                                {{ $comment->user->name }}
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                                style="border: none; background-color: transparent">
                                                @auth
                                                    @if ($comment->user->id == Auth::user()->id)
                                                        {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) !!}

                                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger w-100']) }}
                                                        {!! Form::close() !!}
                                                    @endif
                                                    <button type="button" class="btn btn-primary mt-1 w-100"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#reply-comment-{{ $comment->id }}">Reply</button>
                                                @endauth
                                            </div>
                                        </div>
                                        {{ $comment->content }}
                                        <!-- Reply Modal -->
                                        <div class="modal fade" id="reply-comment-{{ $comment->id }}" tabindex="-1"
                                            aria-labelledby="replyModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <!-- Reply form-->
                                                        {!! Form::open(['route' => 'replies.store']) !!}

                                                        <textarea name="content" class="form-control" rows="3"
                                                            placeholder="Reply to {{ $comment->user->name }}'s comment"></textarea>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="submit" class="btn btn-dark mt-3">Reply</button>
                                                        </div>
                                                        {!! Form::hidden('comment_id', $comment->id) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Replies -->
                                        @if (count($comment->replies) > 0)
                                            @foreach ($comment->replies->sortByDesc('created_at') as $reply)
                                                <div class="d-flex mt-4">
                                                    <div class="flex-shrink-0"><img class="rounded-circle"
                                                            src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                            alt="..." /></div>
                                                    <div class="ms-3">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="" role="button"
                                                                id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                                aria-expanded="false"
                                                                style="text-decoration: none; font-weight: 600; color: #000;">
                                                                {{ $reply->user->name }}
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                                                style="border: none; background-color: transparent">
                                                                @auth
                                                                    @if ($reply->user->id == Auth::user()->id)
                                                                        {!! Form::open(['route' => ['replies.destroy', $reply->id], 'method' => 'DELETE']) !!}
                                                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger w-100']) }}
                                                                        {!! Form::close() !!}
                                                                    @endif
                                                                @endauth
                                                            </div>
                                                        </div>
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
                    <div class="card-header rounded bg-dark text-light">Recent posts from {{ $post->user->name }}</div>

                    <div class="list-group">
                        @foreach ($recentPostsFromTheAuthor as $post)
                            <a href="/posts/{{ $post->id }}"
                                class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                <img src="{{ asset('storage/images/profile/' . Auth::user()->profile_image) }}"
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
                    </div>

                </div>

                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header bg-dark text-light">Categories</div>

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
