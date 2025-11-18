@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">{{ $section->name }}</h1>
  <a href="{{ route('sections.edit',$section) }}" class="btn btn-outline-secondary">Edit</a>
</div>

<p class="text-muted">Room: {{ $section->room ?? '—' }}</p>

<h2 class="h5 mt-4">Students</h2>
<ul class="list-group">
  @forelse($section->students as $st)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <span>{{ $st->full_name }} <small class="text-muted">({{ $st->email }})</small></span>
      <a class="btn btn-sm btn-outline-primary" href="{{ route('students.show',$st) }}">View</a>
    </li>
  @empty
    <li class="list-group-item">No students in this section.</li>
  @endforelse
</ul>
@endsection
