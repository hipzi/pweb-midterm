<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container edit-container">
            <form action="{{ route('profile.edit') }}" method="POST">
                @csrf
                <h1 style="margin-bottom:20px;">Edit Profile</h1>
                <label class="left-label" for="name">{{ __('Name') }}</label>
                <input type="text" name="name" placeholder="Name" value="{{ old('name', $user->name) }}"/>
                <label for="email">{{ __('Email') }}</label>
                <input type="email" name="email" placeholder="Email" value="{{ old('name', $user->email) }}"/>
                <label for="username">{{ __('Username') }}</label>
                <input type="text" name="username" placeholder="Username" value="{{ old('name', $user->username) }}"/>
                <button class="button-center">Edit</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay-edit">
                <div class="overlay-panel overlay-right">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
