<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
    <div class="container">
        <h1>Student Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Profile Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>
                            @if ($student->profile_picture)
                                <img src="{{ asset($student->profile_picture) }}" alt="{{ $student->name }}" style="width: 50px; height: 50px;">
                            @else
                                No Picture
                            @endif
                        </td>
                       <td> <a href="{{ route('editdata', ['id' => $student->id]) }}" class="btn btn-primary">edit</a></td>
                        <td><a href="{{ route('deletedata', ['id' => $student->id]) }}" class="btn btn-danger">delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>


</body>
</html>
