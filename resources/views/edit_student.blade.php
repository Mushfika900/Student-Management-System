<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Student Name:</label>
        <input type="text" name="name" value="{{ old('name', $student->name) }}" required>
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $student->email) }}" required>
        <br><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" required>
        <br><br>

        <button type="submit">Update Student</button>
    </form>
    <br>
    <a href="{{ url('/students') }}">Back to Student List</a>
</body>
</html>