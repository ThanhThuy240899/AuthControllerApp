<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Company</title>
</head>

<body>
    <h1>Register Company</h1>
    @if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
    @endif
    {{-- if errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('auth.registercompanysubmit') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}"><br>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"><br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password"><br>

        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ old('address') }}"><br>
        
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"><br>

        <!-- Career selection -->
        <label for="career_id">Select Career</label>
        <select name="career_id" id="career_id" value="{{ old('career_id') }}">
            @foreach ($careers as $career)
                <option value="{{ $career->id }}">{{ $career->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">Register</button>

    </form>

</body>

</html>
