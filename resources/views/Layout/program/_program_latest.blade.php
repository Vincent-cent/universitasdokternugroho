<section class="py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Latest Programs</h2>
    <div class="row">
      @foreach($latestPrograms as $program)
        @include('Layout.program._program_card', ['program' => $program])
      @endforeach
    </div>
  </div>
</section>