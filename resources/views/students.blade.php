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
    <p>Welcome to the Student Management System. Here you can manage student records, including adding new students, viewing existing records and updating or deleting student information.</p>
    <a href="{{ route('students.create') }}">Add Student</a>
</body>
</html>