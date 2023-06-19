@extends('layouts.admin', ['title' => 'Tambah Resepsionis'])

@section('content-header')
	<h1 class="m-0"><i class="fas fa-users"></i> Tambah User Resepsionis</h1>
@endsection

@section('content')
	<x-form-input :action="route('storeAdmin')" method="post" btnName="Tambah">
		<x-input label="Nama" type="text" name="nama" />
		<x-input label="Username" type="text" name="username" />
		<x-input label="Password" type="password" name="password" />
		<x-input label="Ulangi Password" type="password" name="password_confirmation" />
		{{-- submit button --}}
	</x-form-input>
@endsection
