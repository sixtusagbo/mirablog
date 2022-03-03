@extends('layouts.lead')

@section('content')
    <!-- Page content-->
    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-8">
              <!-- Post content-->
              <article>
                  <!-- Post header-->
                  <header class="mb-4">
                      <!-- Post title-->
                      <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
                      <!-- Post meta content-->
                      <div class="text-muted fst-italic mb-2">Posted on {{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}</div>
                      <!-- Post categories-->
                      <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                      <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                  </header>
                  <!-- Preview image figure-->
                  <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                  <!-- Post content-->
                  <section class="mb-5">
                      <p class="fs-5 mb-4">{{$post->body}}</p>
                  </section>
              </article>
              <!-- Comments section-->
              <section class="mb-5">
                  <div class="card bg-light">
                      <div class="card-body">
                          <!-- Comment form-->
                          <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                          <!-- Comment with nested comments-->
                          <div class="d-flex mb-4">
                              <!-- Parent comment-->
                              <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                              <div class="ms-3">
                                  <div class="fw-bold">Commenter Name</div>
                                  If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                  <!-- Child comment 1-->
                                  <div class="d-flex mt-4">
                                      <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                      <div class="ms-3">
                                          <div class="fw-bold">Commenter Name</div>
                                          And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                      </div>
                                  </div>
                                  <!-- Child comment 2-->
                                  <div class="d-flex mt-4">
                                      <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                      <div class="ms-3">
                                          <div class="fw-bold">Commenter Name</div>
                                          When you put money directly to a problem, it makes a good headline.
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- Single comment-->
                          <div class="d-flex">
                              <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                              <div class="ms-3">
                                  <div class="fw-bold">Commenter Name</div>
                                  When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          </div>
          <!-- Side widgets-->
          <div class="col-lg-4">
            <!-- Recent posts widget -->
            <div class="mb-4">
                <div class="card-header rounded">More from the author</div>
                
                  <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">List group item heading</h6>
                          <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">now</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Another title here</h6>
                          <p class="mb-0 opacity-75">Some placeholder content in a paragraph that goes a little longer so it wraps to a new line.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">3d</small>
                      </div>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <img src="https://github.com/twbs.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Third heading</h6>
                          <p class="mb-0 opacity-75">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="opacity-50 text-nowrap">1w</small>
                      </div>
                    </a>
                  </div>
                
            </div>

            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                  @foreach ($categories as $category)    
                    <a class="btn btn-primary mb-2" href="">{{$category->name}} <span class="badge bg-danger">4</span></a>
                  @endforeach
                </div>
            </div>

          </div>
      </div>
  </div>
@endsection