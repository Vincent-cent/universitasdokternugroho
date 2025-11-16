<div class="col-md-3 mb-4">
  <div class="card h-100 border-0 shadow-sm text-center">
    <img src="{{ $collaborator->logo_path ?? asset('images/placeholder-collaborator.png') }}"
         alt="{{ $collaborator->name }}"
         class="rounded-circle mx-auto mt-3"
         style="width: 120px; height: 120px; object-fit: cover;">

    <div class="card-body">
      <h5 class="fw-semibold mb-2">{{ $collaborator->name }}</h5>
      <p class="text-muted small mb-1 text-uppercase">{{ $collaborator->type }}</p>

      @if($collaborator->verified)
        <span class="badge bg-success mb-2">Verified</span>
      @else
        <span class="badge bg-secondary mb-2">Unverified</span>
      @endif

      <p class="text-secondary small">{{ Str::limit($collaborator->description, 80) }}</p>
    </div>

    <div class="card-footer bg-white border-0">
      <a href="{{ route('collaborator.show', $collaborator->slug) }}" class="stretched-link"></a>

      @if($isAdmin)
    <div class="d-flex justify-content-center gap-2 mt-2">
      <a href="{{ route('collaborator.edit', $collaborator->id) }}" class="btn btn-warning btn-sm">Edit</a>
      <form action="{{ route('collaborator.destroy', $collaborator->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this collaborator?')">
          Delete
        </button>
      </form>
    </div>
  @endif
    </div>
  </div>
</div>
