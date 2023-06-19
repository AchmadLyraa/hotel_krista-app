@if (session('status') == 'store')
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Akun telah ditambahkan.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (session('status') == 'update')
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Data telah diubah.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (session('status') == 'destroy')
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Berhasil!</strong> Akun telah dihapus.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
