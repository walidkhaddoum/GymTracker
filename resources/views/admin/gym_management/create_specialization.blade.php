<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Specialization</title>
</head>
<body>
<form method="POST" action="{{ route('admin.specializations.store') }}">
    @csrf
    <label for="name">Specialization Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
