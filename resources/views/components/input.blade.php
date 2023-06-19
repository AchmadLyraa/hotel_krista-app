@props(['label', 'type' => 'text', 'id', 'name', 'value' => null])

<div class="col-11">
	<div class="mb-3">
		<label for="name" class="form-label">{{ $label }}</label>
		<input type="{{ $type }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : '' }}"
			id="{{ isset($id) ? $id : '' }}" name="{{ $name }}" value="{{ old($name, $value) }}">
		@error($name)
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
</div>
{{-- value="{{ isset($value) ? old($value) : old($name) }} --}}
