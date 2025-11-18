@extends('layouts.app')
@section('content')
<h1 class="h3 mb-3">Edit Section</h1>
<form method="POST" action="{{ route('sections.update',$section) }}" class="card card-body">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" value="{{ old('name',$section->name) }}" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Room</label>
    <input name="room" value="{{ old('room',$section->room) }}" class="form-control">
  </div>
  <div class="d-flex gap-2">
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('sections.index') }}" class="btn btn-secondary">Back</a>
  </div>
</form>
@endsection
