<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Management System</title>
</head>
<body>
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
        
    @endif
    <h1>Student Management System</h1>
    <p>Welcome to the Student Management System.
         Here you can manage student records, including 
         adding new students, viewing existing records
          and updating or deleting student information.</p>
        </p>

        
    <a href="{{ route('students.create') }}">Add Student</a><br><br>
    <h2>Student List</h2>
    <form action="{{ route('students.index') }}" method="GET">
    <input type="text"
           name="search"
           value="{{ request('search') }}"
           placeholder="Search students...">

    <button type="submit">Search</button>
    <a href="{{ route('students.index') }}">Reset</a>
</form>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
               <a href="{{ route('students.edit', $student->id) }}">
                    Edit
                </a>

    <form action="{{ route('students.destroy', $student->id) }}"
          method="POST"
          style="display:inline;"
          onsubmit="return confirm('Are you sure you want to delete this student?')">

        @csrf
        @method('DELETE')

        <button type="submit">Delete</button>
    </form>
</td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4">No students found.</td>
                </tr>
            @endforelse
        </tbody>
</body>
</html>