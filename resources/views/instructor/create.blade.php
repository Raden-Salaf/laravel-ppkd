@extends('layouts.app')
@section('title', 'Create New Data Instructor')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? "" }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option @selected (old('major_id') == $major->id) value="{{ $major->id }}">{{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter Your Name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid
                    @enderror" placeholder="Enter Your Number Phone" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Input Your Email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Input Your Password" name="password" required>
                </div>



                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>

@endsection
