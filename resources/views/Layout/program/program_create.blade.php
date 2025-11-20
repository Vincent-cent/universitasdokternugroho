@extends('Layout.mainLayout')

@section('title', 'Create New Program - Universitas Doktor Nugroho')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="display-6 fw-bold text-primary">Create New Program</h1>
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
                    <form method="POST" action="{{ route('programs.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                   id="title" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label fw-semibold">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                   id="slug" name="slug" value="{{ old('slug') }}" required>
                            <div class="form-text">URL-friendly version of the title (e.g., my-awesome-program)</div>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label fw-semibold">Category</label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category">
                                <option value="">Select a category...</option>
                                <option value="Charity" {{ old('category') === 'Charity' ? 'selected' : '' }}> Charity</option>
                                <option value="Education" {{ old('category') === 'Education' ? 'selected' : '' }}> Education</option>
                                <option value="Community" {{ old('category') === 'Community' ? 'selected' : '' }}> Community</option>
                                <option value="Research" {{ old('category') === 'Research' ? 'selected' : '' }}> Research</option>
                            </select>
                            @error('category')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ old('status') === 'paused' ? 'selected' : '' }}>Paused</option>
                                <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_summary" class="form-label fw-semibold">Short Summary</label>
                            <textarea class="form-control @error('short_summary') is-invalid @enderror" 
                                      id="short_summary" name="short_summary" rows="3" 
                                      maxlength="500">{{ old('short_summary') }}</textarea>
                            <div class="form-text">Maximum 500 characters</div>
                            @error('short_summary')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="logo_path" class="form-label fw-semibold">Program Logo</label>
                            <input type="file" class="form-control @error('logo_path') is-invalid @enderror" 
                                   id="logo_path" name="logo_path" accept="image/*">
                            <div class="form-text">Upload a logo for the program (JPG, PNG, JPEG, WEBP - Max 2MB)</div>
                            @error('logo_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="hero_image_path" class="form-label fw-semibold">Hero Image</label>
                            <input type="file" class="form-control @error('hero_image_path') is-invalid @enderror" 
                                   id="hero_image_path" name="hero_image_path" accept="image/*">
                            <div class="form-text">Upload a hero image for the program (JPG, PNG, JPEG, WEBP - Max 2MB)</div>
                            @error('hero_image_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('public') is-invalid @enderror" 
                                       type="checkbox" value="1" id="public" name="public"
                                       {{ old('public') ? 'checked' : '' }}>
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
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus me-2"></i>Create Program
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







<script>
document.getElementById('title').addEventListener('input', function(e) {
    const slug = e.target.value
        .toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    document.getElementById('slug').value = slug;
});
</script>
@endsection