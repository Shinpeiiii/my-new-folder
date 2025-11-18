@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Sections</h1>
  <a href="{{ route('sections.create') }}" class="btn btn-primary">New Section</a>
</div>

<table class="table table-striped align-middle">
  <thead><tr>
    <th>Name</th><th>Room</th><th>Students</th><th class="text-end">Actions</th>
  </tr></thead>
  <tbody>
  @forelse($sections as $s)
    <tr>
      <td><a href="{{ route('sections.show',$s) }}">{{ $s->name }}</a></td>
      <td>{{ $s->room ?? '—' }}</td>
      <td>{{ $s->students_count }}</td>
      <td class="text-end">
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('sections.edit',$s) }}">Edit</a>
        <form action="{{ route('sections.destroy',$s) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Delete this section?');">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-outline-danger">Delete</button>
        </form>
      </td>
    </tr>
  @empty
    <tr><td colspan="4" class="text-center">No sections.</td></tr>
  @endforelse
  </tbody>
</table>

{{ $sections->links() }}
@endsection
