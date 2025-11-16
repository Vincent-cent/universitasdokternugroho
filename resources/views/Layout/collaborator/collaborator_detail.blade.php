@extends('Layout.mainLayout')

@section('content')
<div class="container py-5">

  <div class="row align-items-center mb-5">
    <div class="col-md-3 text-center">
      <img src="{{ $collaborator->logo_path ?? asset('images/placeholder-collaborator.png') }}"
           alt="{{ $collaborator->name }}"
           class="img-fluid rounded-circle shadow-sm"
           style="max-width: 180px; height: 180px; object-fit: cover;">
    </div>
    <div class="col-md-9">
      <h1 class="fw-bold">{{ $collaborator->name }}</h1>
      <p class="text-muted mb-1">{{ ucfirst($collaborator->type) }}</p>
      <p class="mb-3">{{ $collaborator->description ?? 'No description available.' }}</p>

      @if($collaborator->website)
        <p>
          <a href="{{ $collaborator->website }}" target="_blank" class="btn btn-outline-primary btn-sm">
            Visit Website
          </a>
        </p>
      @endif

      @if(!empty($collaborator->social_links))
        <div>
          @foreach($collaborator->social_links as $platform => $url)
            <a href="{{ $url }}" target="_blank" class="btn btn-light border btn-sm me-2 text-capitalize">
              {{ $platform }}
            </a>
          @endforeach
        </div>
      @endif
    </div>
  </div>

  <div class="mb-4">
    <h3 class="fw-bold mb-3">Programs Supported</h3>

    <div class="row">
      @forelse($collaborator->programs as $program)
        @include('Layout._program_card', ['program' => $program])
      @empty
        <p class="text-muted">No programs found for this collaborator.</p>
      @endforelse
    </div>
  </div>

</div>
@endsection
