@extends('Layout.mainLayout')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">All Collaborators</h1>

  <form method="GET" action="{{ route('collaborator.search') }}" class="row g-3 mb-4">
    <div class="col-md-4">
      <input type="text" name="q" class="form-control" placeholder="Search by name or description..."
             value="{{ request('q') }}">
    </div>

    <div class="col-md-3">
      <select name="type" class="form-select">
        <option value="">All Types</option>
        @foreach($types as $type)
          <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
            {{ ucfirst($type) }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="col-md-3">
      <select name="verified" class="form-select">
        <option value="">All Status</option>
        <option value="1" {{ request('verified') === '1' ? 'selected' : '' }}>Verified</option>
        <option value="0" {{ request('verified') === '0' ? 'selected' : '' }}>Unverified</option>
      </select>
    </div>

    <div class="col-md-2 d-grid">
      <button class="btn btn-primary" type="submit">Search</button>
    </div>
  </form>
  
        @if($isAdmin)
        <div class="mb-3 text-end">
            <a href="{{ route('collaborators.create') }}" class="btn btn-primary">
            + Add New Collaborator
            </a>
        </div>
        @endif

  <div class="row">
    @forelse($collaborators as $collaborator)
      @include('Layout._collaborator_card', ['collaborator' => $collaborator])
    @empty
      <p class="text-muted">No collaborators found.</p>
    @endforelse
  </div>

  <div class="mt-4">
    {{ $collaborators->links() }}
  </div>
</div>
@endsection
