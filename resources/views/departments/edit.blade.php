<!DOCTYPE html>
<html>
<head>
    <title>Edit Department</title>
</head>
<body>
    <h1>Edit Department</h1>
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

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Code:</label>
            <input type="text" name="code" value="{{ old('code', $department->code) }}" required>
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $department->name) }}" required>
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $department->description) }}</textarea>
        </div>
        <div>
            <label>Status:</label>
            <select name="status">
                <option value="active" {{ old('status', $department->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $department->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit">Update Department</button>
    </form>
</body>
</html>