@extends('layout.main')
@section('content')
@if (isset($_SESSION['errors']) && isset($_GET['msg']))
<ul>
    @foreach ($_SESSION['errors'] as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
@endif
@if (isset($_SESSION['success']) && isset($_GET['msg']))
<span>{{ $_SESSION['success'] }}</span>
@endif
<form action="{{ route('update/'.$student->id) }}" method="POST">
    <input type="hidden" name="id" value="{{ $student->id }}">
    <label>Name</label>
    <input type="text" name="name" value="{{ $student->name }}">
    <label>Year Of Birth</label>
    <input type="text" name="year_of_birth" value="{{ $student->year_of_birth }}">
    <label>Phone Number</label>
    <input type="text" name="phone_number" value="{{ $student->phone_number }}">
    <button type="submit" name="btn-submit" value="Cập nhật">Cập nhật</button>
</form>
@endsection


