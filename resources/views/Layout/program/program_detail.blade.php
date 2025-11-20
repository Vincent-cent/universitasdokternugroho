@extends('Layout.mainLayout')

@section('content')
<div class="container py-5">

  <div class="row mb-4 align-items-center">
    <div class="col-md-8">
      <h1 class="fw-bold mb-3">{{ $program->title }}</h1>
      <div class="text-muted">
        <small>
          <strong>Category:</strong> {{ $program->category ?? 'General' }} |
          <strong>Status:</strong>
          <span class="badge 
            @if($program->status === 'completed') bg-success
            @elseif($program->status === 'ongoing' || $program->status === 'active') bg-primary
            @elseif($program->status === 'coming soon' || $program->status === 'upcoming') bg-secondary
            @else bg-secondary
            @endif">
            {{ ucfirst($program->status) }}
          </span> |
          <strong>Start:</strong> {{ $program->start_date ? $program->start_date->format('M j, Y') : '—' }} |
          <strong>End:</strong> {{ $program->end_date ? $program->end_date->format('M j, Y') : '—' }}
        </small>
      </div>
    </div>

    <div class="col-md-4 text-end">
      @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="btn-group shadow-sm" role="group">
          <a href="{{ route('programs.edit', $program->id) }}" 
             class="btn btn-primary px-4 py-2 fw-semibold" 
             style="border-radius: 25px 0 0 25px;">
            <i class="fas fa-edit me-2"></i>Edit Program
          </a>
          <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger px-4 py-2 fw-semibold" 
                    style="border-radius: 0 25px 25px 0;"
                    onclick="return confirm('Are you sure you want to delete this program? This action cannot be undone!')">
              <i class="fas fa-trash me-2"></i>Delete
            </button>
          </form>
        </div>
      @endif
    </div>
  </div>

  <div class="mb-4">
    <img src="@php
        if ($program->hero_image_path) {
            if (str_starts_with($program->hero_image_path, 'http') || 
                str_starts_with($program->hero_image_path, 'https') || 
                str_starts_with($program->hero_image_path, '/')) {
                echo $program->hero_image_path;
            } else {
                echo asset('storage/' . $program->hero_image_path);
            }
        } else {
            echo asset('images/placeholder-program.png');
        }
    @endphp"
         alt="{{ $program->title }}"
         class="img-fluid rounded shadow-sm">
  </div>

  <div class="mb-5">
    <p class="lead text-secondary">{{ $program->short_summary }}</p>
    <div class="text-dark">
      {!! nl2br(e($program->description)) !!}
    </div>
  </div>

  @if(!empty($program->vision_goals))
    <div class="mb-5">
      <h4 class="fw-bold mb-3">Vision & Goals</h4>
      <ul class="list-group list-group-flush">
        @foreach(json_decode($program->vision_goals, true) as $goal)
          <li class="list-group-item">{{ $goal }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if($program->activities->isNotEmpty())
    <div class="mb-5">
      <div class="list-group">
        <h3 class="fw-bold mb-3">Activities Under This Program</h3>
        @foreach($program->activities as $activity)
        <div class="list-group-item d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
            <img src="{{ $activity->thumbnail ?? asset('images/placeholder-activity.png') }}"
                alt="{{ $activity->title }}"
                class="rounded me-3"
                style="width: 80px; height: 80px; object-fit: cover;">
            <div>
                <div class="fw-semibold">{{ $activity->title }}</div>
                <p class="mb-1 text-muted small">{{ Str::limit($activity->summary, 100) }}</p>
                <small class="text-muted">
                {{ $activity->start_date->format('M j, Y') }} – {{ $activity->end_date->format('M j, Y') }}
                </small>
            </div>
            </div>
            <span class="badge rounded-pill
            @if($activity->status === 'completed') bg-success
            @elseif($activity->status === 'ongoing' || $activity->status === 'active') bg-primary
            @elseif($activity->status === 'coming soon' || $activity->status === 'upcoming') bg-secondary
            @else bg-secondary
            @endif">{{ ucfirst($activity->status) }}</span>
        </div>
        @endforeach
      </div>
    </div>
  @endif

  @if($program->collaborators->isNotEmpty())
    <div class="mb-5">
      <h4 class="fw-bold mb-3">Partners & Collaborators</h4>
      <div class="row text-center">
        @foreach($program->collaborators as $collab)
          <div class="col-md-2 col-4 mb-4">
            <img src="{{ $collab->logo_path ?? asset('images/placeholder-logo.png') }}"
                 alt="{{ $collab->name }}"
                 class="img-fluid rounded-circle shadow-sm mb-2"
                 style="max-width: 100px;">
            <p class="fw-semibold small mb-0">{{ $collab->name }}</p>
          </div>
        @endforeach
      </div>
    </div>
  @endif

  @if($program->budget_amount)
    <div class="mb-5">
      <h4 class="fw-bold mb-3">Budget & Funding</h4>
      <p class="text-secondary">
        <strong>Budget:</strong> Rp {{ number_format($program->budget_amount, 0, ',', '.') }}
      </p>
    </div>
  @endif

</div>
@endsection
