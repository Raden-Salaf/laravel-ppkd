@extends('layouts.app')
@section('title', 'Edit Menu')

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

        .form-check-label {
            color: inherit;
            font-weight: 600;
        }
    </style>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? 'Edit Menu' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.update', $menu->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                            value="{{ old('name', $menu->name) }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="parent_id" class="form-label">Parent</label>
                        <select name="parent_id" id="parent_id" class="form-select">
                            <option value="">--- Select One ---</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}"
                                    {{ old('parent_id', $menu->parent_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter Icon"
                            value="{{ old('icon', $menu->icon) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL"
                            value="{{ old('url', $menu->url) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="sort_order" name="sort_order"
                            placeholder="Enter Sort Order" value="{{ old('sort_order', $menu->sort_order) }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label d-block">Status *</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="is_active" id="active" value="1"
                                {{ old('is_active', $menu->is_active) == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input text-dark" type="radio" name="is_active" id="inactive" value="0"
                                {{ old('is_active', $menu->is_active) == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label class="form-label d-block">Assign to Roles</label>
                        @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="roles[]" id="role-{{ $role->id }}"
                                    value="{{ $role->id }}" {{ in_array($role->id, $menuRoles) ? 'checked' : '' }}>
                                <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="btn btn-warning">Back</a>
            </form>
        </div>
    </div>
@endsection
