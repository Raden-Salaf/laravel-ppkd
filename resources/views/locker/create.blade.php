@extends('layouts.app')
@section('title', 'Create New Locker')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? "" }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('locker.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Locker Code *</label>
                    <input type="number" class="form-control @error('locker_name') is-invalid @enderror"
                        value="{{ old('locker_name') }}" placeholder="Enter Your code" name="locker_name" required>
                    @error('locker_name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Batch *</label>
                    <select name="batch" class="form-select" id="" required>
                        <option value="">--Chose Batch--</option>
                        <option value="1">Batch 1</option>
                        <option value="2">Batch 2</option>
                        <option value="3">Batch 3</option>
                        <option value="4">Batch 4</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="" class="form-label">Major *</label>
                    <select name="major" class="form-select" id="" required>
                        <option value="">--Chose Major--</option>
                        <option value="Web Programming">Web Programming</option>
                        <option value="Content Creator">Content Creator</option>
                        <option value="App Developer">App Developer</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="" class="form-label">Status *</label>
                    <select name="status" class="form-select" id="" required>
                        <option value="">--Chose Status--</option>
                        <option value="Available">Available</option>
                        <option value="Unavailable">Unavailable</option>
                        <option value="Damaged">Damaged</option>
                        <option value="Missing">Missing</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>

@endsection
