@csrf
<div class="mb-3">
  <label class="form-label">First name</label>
  <input name="first_name" value="{{ old('first_name', $student->first_name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
  <label class="form-label">Last name</label>
  <input name="last_name" value="{{ old('last_name', $student->last_name ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
  <label class="form-label">Email</label>
  <input name="email" type="email" value="{{ old('email', $student->email ?? '') }}" class="form-control" required>
</div>
<div class="mb-3">
  <label class="form-label">Section</label>
  <select name="section_id" class="form-select" required>
    <option value="">Choose…</option>
    @foreach($sections as $id => $name)
      <option value="{{ $id }}" @selected(old('section_id', $student->section_id ?? '') == $id)>{{ $name }}</option>
    @endforeach
  </select>
</div>
