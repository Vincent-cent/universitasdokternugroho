<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold mb-4">Featured Programs</h2>
    <div class="row">
      @forelse($featuredPrograms as $program)
        @include('Layout.program._program_card', ['program' => $program])
      @empty
        <p class="text-muted">No featured programs available.</p>
      @endforelse
    </div>
  </div>
</section>