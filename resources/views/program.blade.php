@extends('Layout.mainLayout')

@section('title', 'Program - Universitas Doktor Nugroho')

@section('content')
  @include('Layout.program._program_featured')
  @include('Layout.program._program_latest')
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Looking for Something Specific?</h2>
      <p class="mb-4">Search through all our programs to find exactly what you need</p>
      <a href="{{ route('program.search') }}" class="btn btn-light btn-lg">
        <i class="fas fa-search me-2"></i>Search Programs
      </a>
    </div>
  </section>
  
  @include('Layout.program._program_collaborators')




@endsection
