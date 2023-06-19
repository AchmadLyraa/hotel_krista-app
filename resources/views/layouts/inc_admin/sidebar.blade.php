<aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">

	<a href="{{ route('home') }}" class="brand-link">
		<img src="{{ url('images/logo-app.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">{{ config('app.name') }}</span>
	</a>

	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<x-nav-user label="Dashboard" icon="fas fa-tachometer-alt" :link="route('dashboard')" />
				@can('role', 'admin')
					<x-nav-user label="User Admin" icon="fas fa-user" :link="route('userAdmin')" />
				@endcan
			</ul>
		</nav>
	</div>

</aside>
