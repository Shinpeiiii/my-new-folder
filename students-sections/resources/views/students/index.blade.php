@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Students</h1>
  <a href="{{ route('students.create') }}" class="btn btn-primary">New Student</a>
</div>

<table class="table table-striped align-middle">
  <thead><tr>
    <th>Name</th><th>Email</th><th>Section</th><th class="text-end">Actions</th>
  </tr></thead>
  <tbody>
  @forelse($students as $st)
    <tr>
      <td><a href="{{ route('students.show',$st) }}">{{ $st->full_name }}</a></td>
      <td>{{ $st->email }}</td>
      <td>
        @if($st->section)
          <a href="{{ route('sections.show',$st->section) }}">{{ $st->section->name }}</a>
        @else —
        @endif
      </td>
      <td class="text-end">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('students.edit',$st) }}">Edit</a>
        <form action="{{ route('students.destroy',$st) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Delete this student?');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="4" class="text-center">No students.</td></tr>
  @endforelse
  </tbody>
</table>

{{ $students->links() }}
@endsection
