@extends('layouts.admin', ['title' => 'User Admin'])

@section('content-header')
	<h1 class="m-0"><i class="fas fa-users"></i> User Admin</h1>
@endsection

@section('content')
	<x-status />
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<x-btn-create :link="route('createAdmin')" />
				</div>
				<div class="col-sm">
					<div class="float-right my-2">
						<label class="m-0"><span>Show:</span></label>
						<select name="" class="">
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
				</div>
				<div class="col-md">
					<x-search />
				</div>
			</div>
		</div>
		<x-card-table>
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Role</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<?php $no = $data->firstItem(); ?>
			<tbody id="table-body">
				@foreach ($data as $user)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $user->nama }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ ucfirst($user->role) }}</td>
						<td>
							<x-btn-edit :link="route('editAdmin', ['user' => $user->username])"> </x-btn-edit>
							<x-btn-delete :link="route('destroyAdmin', ['user' => $user->username])" :isRoleAdmin="$user->role == 'admin'"></x-btn-delete>
						</td>
					</tr>
				@endforeach
			</tbody>
		</x-card-table>

		<div class="card-body pb-0">
			{{ $data->links('page') }}
		</div>
	</div>
@endsection

@section('modal')
	<x-modal-delete />
@endsection
