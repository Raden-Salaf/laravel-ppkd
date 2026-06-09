@extends('layouts.app')
@section('title', 'Update Phone')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? "" }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option {{ $major->id == $edit->major_id ? 'selected' : ''}} value="{{ $major->id }}">
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                    <br>
                    <div class="mb-3">
                        <label for="">Name *</label>
                        <input type="text" class="form-control" placeholder="Enter Your Update Name" name="name" required
                            value="{{ $edit->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" placeholder="Enter Your Update Name" name="phone" required
                            value="{{ $edit->phone }}">
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>

@endsection