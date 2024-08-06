@extends('layout.main')
@section('content')
<a href="{{ route('create')}}">Thêm sinh viên</a>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Year of Birth</th>
            <th>Phone Number</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($data as $st)
                <tr>
                    <td>{{ $st->id }}</td>
                    <td>{{ $st->name }}</td>
                    <td>{{ $st->year_of_birth }}</td>
                    <td>{{ $st->phone_number }}</td>
                    <td>
                        <a href="{{ route('edit/'.$st->id) }}">Sửa</a>
                        <form action="{{ route('destroy/'.$st->id) }}" method="POST" style="display:inline;">
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
