@extends('layouts.lead')

@section('content')
  
  <!-- Page header with logo and tagline-->
  <header class="py-5 bg-light border-bottom mb-4">
      <div class="container">
          <div class="text-center my-5">
              <h1 class="fw-bolder">About {{ config('app.name', 'Mirablog') }}</h1>
              <p class="lead mb-0">All through Laravel course project website</p>
          </div>
      </div>
  </header>
  <!-- Page content-->
  
@endsection
