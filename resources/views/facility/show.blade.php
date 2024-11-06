<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/facilities/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Facility Details</h1>
    <p><strong>Name:</strong> {{ $facility->name }}</p>
    <p><strong>Location:</strong> {{ $facility->location }}</p>

    <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Back to List</a>
@endsection

</body>
</html>