<nav class="navbar navbar-expand-md navbar-dark bg-info shadow">
	<div class="container">
		<a class="navbar-brand h1" href="{{ url('/') }}">
			<img src="{{ asset('images/logo-app.jpg') }}" width="30" height="30" class="d-inline-block align-top img-circle"
				alt="Logo">
			{{ config('app.name') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<x-nav-guest label="Home" :link="route('home')" />
				<x-nav-guest label="About" :link="route('about')" />
				<x-nav-guest label="Login" :link="route('login')" />
			</ul>
		</div>
	</div>
</nav>
