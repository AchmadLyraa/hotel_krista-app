@props(['action', 'method', 'btnName', 'header' => true])

<div class="card" style="max-width: 25rem;">
	<form action="{{ $action }}" method="{{ $method }}">
		@if ($header)
			<div class="card-header bg-primary">
				<i class="fa fa-plus-circle"></i> {{ $btnName }}
			</div>
		@endif
		<div class="card-body">
			<div class="row">
				<?= $slot ?>
			</div>
			<button type="submit" class="btn btn-primary float-right mt-2">
				{{ $btnName }}
			</button>
		</div>
	</form>
</div>
