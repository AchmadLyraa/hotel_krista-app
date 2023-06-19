@props(['link', 'isRoleAdmin'])
<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-link="{{ $link }}"
	@if ($isRoleAdmin) data-target="#modalForbiddenDelete" @else data-target="#modalDelete" @endif>
	<i class="fa fa-trash" style="color: #ffffff;"></i>
</button>
