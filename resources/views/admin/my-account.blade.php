@extends('layouts.admin', ['title' => 'Account'])

@section('content-header')
	<h1 class="m-0"><i class="fas fa-user"></i> Akun Saya</h1>
@endsection

@section('content')
	<x-status />
	<x-form-input :action="route('myAccount')" method="post" btnName="Update" :header="false">
		@method('put')
		<x-input label="Nama" type="text" name="nama" :value="$user->nama" />
		<x-input label="Username" type="text" name="username" :value="$user->username" />
		<x-input label="Password" type="password" name="password" />
		<x-input label="Ulangi Password" type="password" name="password_confirmation" />
	</x-form-input>
@endsection
