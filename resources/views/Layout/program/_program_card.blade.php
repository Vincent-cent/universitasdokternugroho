<div class="col-md-4 mb-4">
  <div class="card h-100 border-0 shadow-sm">
    @php
      $imageSrc = asset('images/placeholder-program.png');
      if($program->hero_image_path) {
        $imageSrc = Str::startsWith($program->hero_image_path, ['http', 'https', '/']) ? $program->hero_image_path : asset('storage/' . $program->hero_image_path);
      } elseif($program->logo_path) {
        $imageSrc = Str::startsWith($program->logo_path, ['http', 'https', '/']) ? $program->logo_path : asset('storage/' . $program->logo_path);
      }
    @endphp
    <img src="{{ $imageSrc }}"
     class="card-img-top"
     alt="{{ $program->title }}"
     style="height: 200px; width: 100%; object-fit: cover;">

    @if(auth()->check() && auth()->user()->role === 'admin')
    <div class="position-absolute top-0 end-0 p-3">
      <div class="d-flex gap-2" role="group">
        <a href="{{ route('programs.edit', $program) }}" 
           class="btn btn-primary text-white d-flex align-items-center justify-content-center"
           title="Edit Program"
           style="width: 50px; height: 50px; border-radius: 8px;">
          <i class="fas fa-edit"></i>
        </a>
        <form method="POST" action="{{ route('programs.destroy', $program) }}" 
              style="display: inline;" 
              onsubmit="return confirm('Are you sure you want to delete this program?')">
          @csrf
          @method('DELETE')
          <button type="submit" 
                  class="btn btn-danger text-white d-flex align-items-center justify-content-center"
                  title="Delete Program"
                  style="width: 50px; height: 50px; border-radius: 8px;">
            <i class="fas fa-trash"></i>
          </button>
        </form>
      </div>
    </div>
    @endif

    <div class="card-body">
      <small class="text-uppercase text-muted fw-bold d-flex align-items-center mb-2">
        @if($program->category === 'Charity')
          <i class="fas fa-heart text-danger me-2"></i>
        @elseif($program->category === 'Education')
          <i class="fas fa-graduation-cap text-primary me-2"></i>
        @elseif($program->category === 'Community')
          <i class="fas fa-users text-success me-2"></i>
        @elseif($program->category === 'Research')
          <i class="fas fa-microscope text-info me-2"></i>
        @else
          <i class="fas fa-folder text-secondary me-2"></i>
        @endif
        {{ $program->category ?? 'General' }}
      </small>
      <h5 class="card-title fw-semibold">{{ $program->title }}</h5>
      <p class="card-text text-secondary small">
        {{ Str::limit($program->short_summary, 100) }}
      </p>
    </div>
    <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
      <small class="text-muted">{{ $program->created_at->format('F j, Y') }}</small>
      <a href="{{ route('program.show', $program->slug) }}" class="btn btn-outline-primary btn-sm">
        View Details
      </a>
    </div>
  </div>
</div>
