@extends('Layout.mainLayout')

@section('title', 'Program - Universitas Doktor Nugroho')

@section('content')
  @include('Layout.program._program_featured')
  @include('Layout.program._program_latest')
  <section class="py-5 bg-primary text-white">
    <div class="container text-center">
      <h2 class="fw-bold mb-3">Ingin lebih tau tentang program kita?</h2>
      <p class="mb-4">Telusuri semua program kami untuk menemukan apa yang Anda butuhkan</p>
      <a href="{{ route('program.search') }}" class="btn btn-light btn-lg">
        <i class="fas fa-search me-2"></i>Search Programs
      </a>
    </div>
  </section>
  
  @include('Layout.program._program_collaborators')




@endsection
