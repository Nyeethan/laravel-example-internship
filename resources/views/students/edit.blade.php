<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <a href="{{ route('students.index') }}">Back to List</a>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>ID Number:</label>
            <input type="text" name="id_number" value="{{ $student->id_number }}" required>
        </div>
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" value="{{ $student->first_name }}" required>
        </div>
        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" value="{{ $student->last_name }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $student->email }}" required>
        </div>
        <button type="submit">Update Student</button>
    </form>
</body>
</html>