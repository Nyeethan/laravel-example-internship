<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <a href="{{ route('students.index') }}">Back to List</a>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div>
            <label>ID Number:</label>
            <input type="text" name="id_number" required>
        </div>
        <div>
            <label>First Name:</label>
            <input type="text" name="first_name" required>
        </div>
        <div>
            <label>Last Name:</label>
            <input type="text" name="last_name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <button type="submit">Save Student</button>
    </form>
</body>
</html>