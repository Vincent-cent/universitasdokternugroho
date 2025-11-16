<div class="container py-5">
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="display-6 fw-bold text-primary">Search Programs</h1>
        @if(auth()->check() && auth()->user()->role === 'admin')
        <a href="{{ route('programs.create') }}" class="btn btn-success">
          <i class="fas fa-plus me-2"></i> + Add New Program
        </a>
        @endif
      </div>
      <p class="lead text-muted">Find the perfect program that matches your interests</p>
    </div>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-5">
          <label for="search" class="form-label fw-semibold">Search</label>
          <input type="text" id="search" wire:model.live.debounce.500ms="search"
                 class="form-control form-control-lg" 
                 placeholder="Search by title or summary..."
                 value="{{ $search }}">
        </div>
        <div class="col-md-3">
          <label for="category" class="form-label fw-semibold">Category</label>
          <select id="category" wire:model.live="category" class="form-select form-select-lg">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
              <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label for="status" class="form-label fw-semibold">Status</label>
          <select id="status" wire:model.live="status" class="form-select form-select-lg">
            <option value="">All Statuses</option>
            @foreach($statuses as $status)
              <option value="{{ $status }}">{{ ucfirst($status) }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button wire:click="clearFilters" class="btn btn-outline-secondary btn-lg w-100" type="button">
            <i class="fas fa-times me-2"></i>Clear
          </button>
        </div>
      </div>
    </div>
  </div>

  <div wire:loading class="text-center py-3">
    <div class="spinner-border text-primary" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  <div wire:loading.remove>
    @if($search || $category || $status)
      <div class="mb-3">
        <p class="text-muted">
          <strong>{{ $programs->total() }}</strong> programs found
          @if($search)
            for "<strong>{{ $search }}</strong>"
          @endif
        </p>
      </div>
    @endif

    <div class="row">
      @forelse($programs as $program)
        @include('Layout.program._program_card', ['program' => $program])
      @empty
        <div class="col-12">
          <div class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">No programs found</h4>
            <p class="text-muted mb-4">Try adjusting your search criteria or browse all programs.</p>
            <button wire:click="clearFilters" class="btn btn-outline-primary">Clear Filters</button>
          </div>
        </div>
      @endforelse
    </div>

    @if($programs->hasPages())
      <div class="d-flex justify-content-center mt-5">
        {{ $programs->links(data: ['scrollTo' => false]) }}
      </div>
    @endif
  </div>
</div>
