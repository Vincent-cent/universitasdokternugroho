@extends('Layout.mainLayout')

@section('title', 'Search Programs - Universitas Doktor Nugroho')

@section('content')
<div class="container py-5">
  <!-- Header Section -->
  <div class="row mb-4">
    <div class="col-12">
      <h1 class="display-6 fw-bold text-primary mb-2">Search Programs</h1>
      <p class="lead text-muted">Find the perfect program that matches your interests</p>
    </div>
  </div>

  <!-- Search and Filters Card -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <form method="GET" action="{{ route('program.search') }}" class="row g-3">
        <div class="col-md-5">
          <label for="search" class="form-label fw-semibold">Search</label>
          <input type="text" id="search" name="q" value="{{ request('q') }}" 
                 class="form-control form-control-lg" 
                 placeholder="Search by title or summary...">
        </div>
        <div class="col-md-3">
          <label for="category" class="form-label fw-semibold">Category</label>
          <select id="category" name="category" class="form-select form-select-lg">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
              <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                {{ ucfirst($cat) }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label for="status" class="form-label fw-semibold">Status</label>
          <select id="status" name="status" class="form-select form-select-lg">
            <option value="">All Statuses</option>
            @foreach($statuses as $status)
              <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button class="btn btn-primary btn-lg w-100" type="submit">
            <i class="fas fa-search me-2"></i>Search
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Results Section -->
  @if(request()->hasAny(['q', 'category', 'status']))
    <div class="mb-3">
      <p class="text-muted">
        <strong>{{ $programs->total() }}</strong> programs found
        @if(request('q'))
          for "<strong>{{ request('q') }}</strong>"
        @endif
      </p>
    </div>
  @endif

  <!-- Program Cards -->
  <div class="row">
    @forelse($programs as $program)
      @include('Layout.program._program_card', ['program' => $program])
    @empty
      <div class="col-12">
        <div class="text-center py-5">
          <i class="fas fa-search fa-3x text-muted mb-3"></i>
          <h4 class="text-muted">No programs found</h4>
          <p class="text-muted mb-4">Try adjusting your search criteria or browse all programs.</p>
          <a href="{{ route('program.search') }}" class="btn btn-outline-primary">Clear Filters</a>
        </div>
      </div>
    @endforelse
  </div>

  <!-- Pagination -->
  @if($programs->hasPages())
    <div class="d-flex justify-content-center mt-5">
      <nav aria-label="Program pagination">
        {{ $programs->links('pagination::bootstrap-4') }}
      </nav>
    </div>
  @endif
</div>
@endsection
