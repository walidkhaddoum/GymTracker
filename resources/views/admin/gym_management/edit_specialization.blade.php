<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Specialization</title>
</head>
<body>
<form method="POST" action="{{ route('admin.specializations.update', $specialization->id) }}">
    @csrf
    @method('PUT')
    <label for="name">Specialization Name:</label><br>
    <input type="text" id="name" name="name" value="{{ $specialization->name }}"><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>
