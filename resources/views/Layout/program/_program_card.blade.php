<div class="col-md-4 mb-4">
  <div class="card h-100 border-0 shadow-sm">
    <img src="{{ $program->hero_image_path ?? $program->logo_path ?? asset('images/placeholder-program.png') }}"
     class="card-img-top"
     alt="{{ $program->title }}">


    <div class="card-body">
      <small class="text-uppercase text-muted fw-bold d-block mb-2">
        {{ $program->category ?? 'General' }}
      </small>
      <h5 class="card-title fw-semibold">{{ $program->title }}</h5>
      <p class="card-text text-secondary small">
        {{ Str::limit($program->short_summary, 100) }}
      </p>
    </div>
    <div class="card-footer bg-white border-0">
      <small class="text-muted">{{ $program->created_at->format('F j, Y') }}</small>
      <a href="{{ route('program.show', $program->slug) }}" class="stretched-link"></a>
    </div>
  </div>
</div>
