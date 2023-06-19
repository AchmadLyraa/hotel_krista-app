@extends('layouts.admin', ['title' => 'Edit Resepsionis'])

@section('content-header')
	<h1 class="m-0"><i class="fas fa-users"></i> Edit User Resepsionis</h1>
@endsection

@section('content')
	{{-- <x-form-input :action="route('updateAdmin', ['user' = $users-username])" method="post" btnName="Edit"
		<x-input label="Nama" type="text" name="nama" />
		<x-input label="Username" type="text" name="username" />
		<x-input label="Password" type="password" name="password" />
		<x-input label="Ulangi Password" type="password" name="confirm_password" />
		submit button
	/x-form-input> --}}

	<x-form-input :action="route('updateAdmin', ['user' => $user->username])" method="post" btnName="Edit">
		@method('put')
		@csrf
		<x-input label="Nama" type="text" name="nama" :value="$user->nama" />
		<x-input label="Username" type="text" name="username" :value="$user->username" />
		<x-input label="Password" type="password" name="password" />
		<x-input label="Ulangi Password" type="password" name="password_confirmation" />
		{{-- submit button --}}
		{{-- :value={{ $user->username }} --}}
	</x-form-input>
@endsection
