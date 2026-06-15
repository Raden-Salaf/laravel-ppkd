@extends('layouts.app')
@section('title', 'Create New Menu')

@section('content')
    <style>
        .form-check-input {
            width: 1.1rem;
            height: 1.1rem;
            border: 2px solid #0f172a;
            background-color: #ffffff;
            cursor: pointer;
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, 0.2);
        }

        .form-check-input:checked {
            background-color: #dc2626;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
        }

        .form-check-input:checked::before {
            content: "✓";
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            line-height: 1;
        }

        .form-check-input:focus {
            outline: none;
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.2);
        }
    </style>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? "" }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.store') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your Name" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="" class="form-label">Parent Id</label>
                        <select name="parent_id" id="" class="form-control" placeholer="Select One">
                            <option value="">Select One</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="" class="form-label">Icon</label>
                        <input name="icon" type="text" id="" class="form-control" placeholder="Enter Icon">
                        </input>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="" class="form-label">Url</label>
                        <input name="url" type="text" id="" class="form-control" placeholder="Enter URL">
                        </input>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6 mb-3">
                        <label for="" class="form-label">Sort Order</label>
                        <input name="sort_order" type="number" id="" class="form-control" placeholder="Enter Sort Order">
                        </input>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label d-">Status*</label>
                        <input type="radio" name="is_active" value="1"> Active
                        <input type="radio" name="is_active" value="0">
                        Inactive
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="" class="form-label d-block">Assign to Roles</label>
                            @foreach ($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="roles[]" id="role-{{ $role->id }}" value="{{ $role->id }}"
                                        checked>
                                    <label for="role-{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>

@endsection
