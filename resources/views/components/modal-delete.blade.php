@section('modal')
	<!-- Modal Confirmation Delete -->
	<div class="modal fade" id="modalDelete" tabindex="-1" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered modal-sm">
			<form class="modal-content" method="POST" action="#">
				@csrf
				@method('delete')
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Yakin ingin menghapus?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>

	<!-- Modal Forbidden Delete -->
	<div class="modal fade" id="modalForbiddenDelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h5 class="modal-title text-white">Maaf, Akun tidak bisa dihapus</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Role tidak bisa dihapus karena merupakan role <strong>Admin</strong>.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

	@push('js')
		<script>
			$('#modalDelete').on('show.bs.modal', function(event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('link') // Extract info from data-* attributes
				var modal = $(this)
				modal.find('.modal-content').attr('action', recipient)
				// modal.find('.modal-content').text('New message to ' + recipient)
			})
		</script>
	@endpush
@endsection
