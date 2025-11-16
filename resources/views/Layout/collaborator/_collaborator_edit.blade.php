@extends('Layout.mainLayout')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Edit Collaborator</h1>

  <form action="{{ route('collaborator.update', $collaborator->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('Layout._collaborator_form')
    <div class="mt-4">
      <button type="submit" class="btn btn-primary">Save Changes</button>
      <a href="{{ route('collaborator.search') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
