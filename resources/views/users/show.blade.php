<h1>User Details</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
    <a href="{{ route('users.index') }}">Back to List</a>