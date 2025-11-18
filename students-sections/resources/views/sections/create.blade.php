@extends('layouts.app')
@section('content')
<h1 class="h3 mb-3">New Section</h1>
<form method="POST" action="{{ route('sections.store') }}" class="card card-body">
  @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name') }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Room</label>
    <input name="room" value="{{ old('room') }}" class="form-control">
  </div>
  <div class="d-flex gap-2">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('sections.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
