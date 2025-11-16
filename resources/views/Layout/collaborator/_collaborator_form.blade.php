<div class="mb-3">
  <label class="form-label">Name</label>
  <input type="text" name="name" class="form-control" 
         value="{{ old('name', $collaborator->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label class="form-label">Type</label>
  <select name="type" class="form-select" required>
    @foreach(['organization','university','foundation','individual'] as $type)
      <option value="{{ $type }}" 
        {{ (old('type', $collaborator->type ?? '') === $type) ? 'selected' : '' }}>
        {{ ucfirst($type) }}
      </option>
    @endforeach
  </select>
</div>

<div class="mb-3">
  <label class="form-label">Description</label>
  <textarea name="description" rows="3" class="form-control">{{ old('description', $collaborator->description ?? '') }}</textarea>
</div>

<div class="mb-3">
  <label class="form-label">Website</label>
  <input type="url" name="website" class="form-control" 
         value="{{ old('website', $collaborator->website ?? '') }}">
</div>

<div class="mb-3">
  <label class="form-label">Logo</label>
  <input type="file" name="logo_path" class="form-control">
  @isset($collaborator)
    @if($collaborator->logo_path)
      <div class="mt-2">
        <img src="{{ asset('storage/'.$collaborator->logo_path) }}" alt="Logo" 
             class="rounded" width="100" height="100">
      </div>
    @endif
  @endisset
</div>

<div class="form-check mb-3">
  <input type="checkbox" name="verified" value="1" class="form-check-input"
         id="verified" {{ old('verified', $collaborator->verified ?? false) ? 'checked' : '' }}>
  <label class="form-check-label" for="verified">Verified</label>
</div>
