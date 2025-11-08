<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="fw-bold mb-4">Our Partners</h2>
    <div class="row justify-content-center">
      @foreach($collaborators as $collab)
        <div class="col-md-2 col-4 mb-3">
          <div class="card border-0">
            <img src="{{ $collab->logo_path ?? asset('images/placeholder-logo.png') }}" 
                 class="img-fluid rounded-circle mx-auto d-block shadow-sm p-2"
                 alt="{{ $collab->name }}">
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
