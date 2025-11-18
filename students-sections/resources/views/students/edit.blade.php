@extends('layouts.app')
@section('content')
<h1 class="h3 mb-3">Edit Student</h1>
<form method="POST" action="{{ route('students.update',$student) }}" class="card card-body">
  @method('PUT')
  @include('students._form')
  <div class="d-flex gap-2">
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
  </div>
</form>
@endsection
