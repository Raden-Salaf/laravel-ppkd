@extends('layouts.app')
@section('title', 'Create New Role')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? "" }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="">Status *</label>
                    <input type="radio" value="1" name="is_active"> Active
                    <br>
                    <input type="radio" value="0" name="is_active"> In Active
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>

@endsection
