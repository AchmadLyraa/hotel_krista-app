@props(['label', 'icon', 'link'])

<?php
// $path = trim(str_replace(url('/'), '', $link), '/');
// $wildchar = $path == url()->current() ? '' : '*';
// $is = request()->is($path . $wildchar);
// $path = $link == url()->current();
?>

<li class="nav-item">
	<a href="<?= $link ?>" class="nav-link{{ Str::startsWith(url()->current(), $link) ? ' active' : '' }}">
		<i class="nav-icon {{ $icon }}"></i>
		<p>{{ $label }}</p>
	</a>
</li>
