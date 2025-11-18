@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">{{ $student->full_name }}</h1>
  <a href="{{ route('students.edit',$student) }}" class="btn btn-outline-secondary">Edit</a>
</div>

<ul class="list-group">
  <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
  <li class="list-group-item"><strong>Section:</strong>
    <a href="{{ route('sections.show',$student->section) }}">{{ $student->section->name }}</a>
  </li>
  <li class="list-group-item"><small class="text-muted">Created: {{ $student->created_at->toDayDateTimeString() }}</small></li>
</ul>
@endsection
