@extends('Layout.mainLayout')

@section('title', 'Edit Program - Universitas Doktor Nugroho')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-6 fw-bold text-primary">Edit Program</h1>
                <a href="{{ route('program.search') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Back to Programs
                </a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{ route('programs.update', $program) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title', $program->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                <option value="">Select a category...</option>
                                <option value="Charity" {{ old('category', $program->category) === 'Charity' ? 'selected' : '' }}>Charity</option>
                                <option value="Education" {{ old('category', $program->category) === 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Community" {{ old('category', $program->category) === 'Community' ? 'selected' : '' }}>Community</option>
                                <option value="Research" {{ old('category', $program->category) === 'Research' ? 'selected' : '' }}>Research</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="active" {{ old('status', $program->status) === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ old('status', $program->status) === 'paused' ? 'selected' : '' }}>Paused</option>
                                <option value="archived" {{ old('status', $program->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_summary" class="form-label fw-semibold">Short Summary</label>
                            <textarea class="form-control @error('short_summary') is-invalid @enderror" 
                                      id="short_summary" name="short_summary" rows="3" 
                                      maxlength="500">{{ old('short_summary', $program->short_summary) }}</textarea>
                            <div class="form-text">Maximum 500 characters</div>
                            @error('short_summary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="5">{{ old('description', $program->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo_path" class="form-label fw-semibold">Program Logo</label>
                            @if($program->logo_path)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($program->logo_path) }}" alt="Current Logo" class="img-thumbnail" style="max-width: 150px;">
                                    <small class="d-block text-muted">Current logo</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo_path') is-invalid @enderror" 
                                   id="logo_path" name="logo_path" accept="image/*">
                            <div class="form-text">Upload a new logo to replace the current one (JPG, PNG, JPEG, WEBP - Max 2MB)</div>
                            @error('logo_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hero_image_path" class="form-label fw-semibold">Hero Image</label>
                            @if($program->hero_image_path)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($program->hero_image_path) }}" alt="Current Hero Image" class="img-thumbnail" style="max-width: 200px;">
                                    <small class="d-block text-muted">Current hero image</small>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('hero_image_path') is-invalid @enderror" 
                                   id="hero_image_path" name="hero_image_path" accept="image/*">
                            <div class="form-text">Upload a new hero image to replace the current one (JPG, PNG, JPEG, WEBP - Max 2MB)</div>
                            @error('hero_image_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('public') is-invalid @enderror" 
                                       type="checkbox" value="1" id="public" name="public"
                                       {{ old('public', $program->public) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="public">
                                    Public Program
                                </label>
                                <div class="form-text">Check this to make the program visible to the public</div>
                                @error('public')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Program
                            </button>
                            <a href="{{ route('program.search') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection