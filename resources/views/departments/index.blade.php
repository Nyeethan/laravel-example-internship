<!DOCTYPE html>
<html>
<head>
    <title>Departments</title>
</head>
<body>
    <h1>Departments</h1>

    <a href="{{ route('departments.create') }}">Add New Department</a>

    <!-- Search Form -->
    <form method="GET" action="{{ route('departments.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search departments...">
        <button type="submit">Search</button>
        <a href="{{ route('departments.index') }}">Clear</a>
    </form>

    <!-- Success Message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Departments Table -->
    <table border="1">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($departments as $department)
            <tr>
                <td>{{ $department->code }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->description ?? 'N/A' }}</td>
                <td>{{ ucfirst($department->status) }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department->id) }}">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5">No departments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div>
    @if($departments->previousPageUrl())
        <a href="{{ $departments->appends(request()->query())->previousPageUrl() }}">Previous</a>
    @endif

    Page {{ $departments->currentPage() }} of {{ $departments->lastPage() }}

    @if($departments->nextPageUrl())
        <a href="{{ $departments->appends(request()->query())->nextPageUrl() }}">Next</a>
    @endif
</div>

</body>
</html>