@extends('layouts.app')
@section('title', 'Update Locker')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? "" }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('locker.update', $locker->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Locker Code *</label>
                    <input type="text" class="form-control @error('locker_name') is-invalid @enderror"
                        value="{{ isset($locker) ? $locker->locker_name : old('locker_name') }}"
                        placeholder="Enter Your Update Code" name="name" required>
                    @error('locker_name')
                        <span class="invalid-feedback"></span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Batch *</label>
                    <select name="batch" class="form-select" id="" required>
                        <option value="">--Chose Batch--</option>
                        <option value="1" {{ $locker->batch == '1' ? 'selected' : '' }}>Batch 1</option>
                        <option value="2" {{ $locker->batch == '2' ? 'selected' : '' }}>Batch 2</option>
                        <option value="3" {{ $locker->batch == '3' ? 'selected' : '' }}>Batch 3</option>
                        <option value="4" {{ $locker->batch == '4' ? 'selected' : '' }}>Batch 4</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Major *</label>
                    <select name="major" class="form-select" id="" required>
                        <option value="">--Chose Major--</option>
                        <option value="Web Programming" {{ $locker->major == 'Web Programming' ? 'selected' : '' }}>Web
                            Programming</option>
                        <option value="Content Creator" {{ $locker->major == 'Content Creator' ? 'selected' : '' }}>Content
                            Creator</option>
                        <option value="App Developer" {{ $locker->major == 'App Developer' ? 'selected' : '' }}>App
                            Developer</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="" class="form-label">Status *</label>
                    <select name="status" class="form-select" id="" required>
                        <option value="">--Chose Status--</option>
                        <option value="Available" {{ $locker->status == 'Available' ? 'selected' : '' }}>Available
                        </option>
                        <option value="Unavailable" {{ $locker->status == 'Unavailable' ? 'selected' : '' }}>Unavailable
                        </option>
                        <option value="Damaged" {{ $locker->status == 'Damaged' ? 'selected' : '' }}>Damaged</option>
                        <option value="Missing" {{ $locker->status == 'Missing' ? 'selected' : '' }}>Missing</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>

@endsection
