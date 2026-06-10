<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
</head>
<body>
    <h1>Add New Department</h1>
    <a href="{{ route('departments.index') }}">Back to List</a>

    <!-- Validation Errors -->
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div>
            <label>Code:</label>
            <input type="text" name="code" value="{{ old('code') }}" required>
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Status:</label>
            <select name="status">
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit">Save Department</button>
    </form>
</body>
</html>