@extends('layouts.lead')

@section('content')
  
        <!-- Page header with logo and tagline-->
        <header class="py-2 bg-light border-bottom mb-4">
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
                      <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2021</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2021</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2021</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <a href=""><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                            <div class="card-body">
                                <div class="small text-muted">January 1, 2021</div>
                                <h2 class="card-title h4">Post Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla.</p>
                                <a class="btn btn-primary" href="#!">Read more →</a>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                          <a class="btn btn-primary mb-2" href="">General <span class="badge bg-danger">4</span></a>
                          <a class="btn btn-primary mb-2" href="">Laravel <span class="badge bg-danger">4</span></a>
                          <a class="btn btn-primary mb-2" href="">PHP <span class="badge bg-danger">4</span></a>
                          <a class="btn btn-primary mb-2" href="">Flutter <span class="badge bg-danger">4</span></a>
                          <a class="btn btn-primary mb-2" href="">C# <span class="badge bg-danger">4</span></a>
                          <a class="btn btn-primary mb-2" href="">Web Design <span class="badge bg-danger">4</span></a>
                        </div>
                    </div>
                    
                    <!-- Recent posts widget -->
                    <div class="mb-4">
                        <div class="card-header rounded">Recent Posts</div>
                        
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
                </div>
            </div>
        </div>
        
        @endsection
