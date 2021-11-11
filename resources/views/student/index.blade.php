@extends('app')
@section('content')
<h1>Hello World</h1>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div>
    <table class="table-bordered">
        <thead>
            <th>Name</th>
            <th>Class</th>
            <th>Roll</th>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->class }}</td>
                <td>{{ $student->roll }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection