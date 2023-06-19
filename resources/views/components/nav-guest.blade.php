@props(['label', 'link'])

<?php
// $path = trim(str_replace(url('/'), '', $link), '/');
// $base = $path == '' ? '/' : '';
// $is = request()->is($base . $path);
$path = $link == url()->current();
?>

<li class="nav-item">
	<a class="nav-link {{ $path ? ' active' : '' }}" href="{{ $link }}">{{ $label }}</a>
</li>
