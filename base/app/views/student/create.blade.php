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
<form action="{{ route('store') }}" method="POST">
<label>Name</label>
<input type="text" name="name">
<label>Year Of Birth</label>
<input type="text" name="year_of_birth">
<label>Phone Number</label>
<input type="text" name="phone_number">
<button type="submit" name="btn-submit" value="Gửi">Gửi</button>
</form>
@endsection