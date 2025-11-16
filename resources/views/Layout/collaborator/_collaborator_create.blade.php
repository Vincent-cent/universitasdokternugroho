@extends('Layout.mainLayout')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold mb-4">Add New Collaborator</h1>

  <form action="{{ route('collaborator.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('Layout.collaborator._collaborator_form')
    <div class="mt-4">
      <button type="submit" class="btn btn-primary">Create Collaborator</button>
      <a href="{{ route('collaborator.search') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
