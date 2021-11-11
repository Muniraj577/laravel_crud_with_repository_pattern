@extends('app')
@section('content')
<div class="contatiner-fluid">
    <form action="{{ route('student.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="form-group col-md-6">
            <label for="class">Class</label>
            <input type="text" name="class" class="form-control" id="class">
          </div>
        </div>
        <div class="form-group">
          <label for="roll">Roll</label>
          <input type="text" name="roll" class="form-control" id="roll">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection