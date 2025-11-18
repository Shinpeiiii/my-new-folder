@extends('layouts.app')
@section('content')
<h1 class="h3 mb-3">New Student</h1>
<form method="POST" action="{{ route('students.store') }}" class="card card-body">
  @include('students._form')
  <div class="d-flex gap-2">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
