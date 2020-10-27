<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SignUp</title>
    <link rel="stylesheet" href="{{asset('css')}}/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('font-awesome')}}/css/font-awesome.min.css">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="{{route('auth.register')}}" method="POST">
            @csrf
			<h1>Register</h1>
			<input type="text" name="name" placeholder="Name" required/>
			<input type="email" name="email" placeholder="Email" required/>
			<input type="text" name="username" placeholder="Username" required/>
			<input type="password" name="password" placeholder="Password" required/>
			@foreach ($roles as $role)
			<label for="{{$role->role}}">
				@php echo ucfirst($role->role); @endphp
				<input type="radio" class="radio" id="{{$role->role}}" name="role" value="{{$role->id}}" checked>
			</label>
			@endforeach
            @if(app('request')->input('error') !== null)
            <p class="error" style="color: red;">{{ app('request')->input('message') }} </p>
            @endif
			<button>Register</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="{{route('auth.auth')}}" method="POST">
            @csrf
			<h1>Login</h1>
			<input type="email" name="email" placeholder="Email" required/>
			<input type="password" name="password" placeholder="Password" required/>
			{{-- <a href="#">Lupa Kata Sandi?</a> --}}
            @if(app('request')->input('error')!== null)
            <p class="error" style="color: red;">{{ app('request')->input('message') }} </p>
            @endif
			<button>Login</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello Friends</h1>
				<p>Insert your profile to start a new journey with us!!</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
