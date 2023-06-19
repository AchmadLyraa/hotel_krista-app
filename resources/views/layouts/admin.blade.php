<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name') }}</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">


	<script nonce="b28b0d9a-745f-4eed-92c5-8b2efdf2baf2">
		(function(w, d) {
			! function(bg, bh, bi, bj) {
				bg[bi] = bg[bi] || {};
				bg[bi].executed = [];
				bg.zaraz = {
					deferred: [],
					listeners: []
				};
				bg.zaraz.q = [];
				bg.zaraz._f = function(bk) {
					return function() {
						var bl = Array.prototype.slice.call(arguments);
						bg.zaraz.q.push({
							m: bk,
							a: bl
						})
					}
				};
				for (const bm of ["track", "set", "debug"]) bg.zaraz[bm] = bg.zaraz._f(bm);
				bg.zaraz.init = () => {
					var bn = bh.getElementsByTagName(bj)[0],
						bo = bh.createElement(bj),
						bp = bh.getElementsByTagName("title")[0];
					bp && (bg[bi].t = bh.getElementsByTagName("title")[0].text);
					bg[bi].x = Math.random();
					bg[bi].w = bg.screen.width;
					bg[bi].h = bg.screen.height;
					bg[bi].j = bg.innerHeight;
					bg[bi].e = bg.innerWidth;
					bg[bi].l = bg.location.href;
					bg[bi].r = bh.referrer;
					bg[bi].k = bg.screen.colorDepth;
					bg[bi].n = bh.characterSet;
					bg[bi].o = (new Date).getTimezoneOffset();
					if (bg.dataLayer)
						for (const bt of Object.entries(Object.entries(dataLayer).reduce(((bu, bv) => ({
								...bu[1],
								...bv[1]
							}))))) zaraz.set(bt[0], bt[1], {
							scope: "page"
						});
					bg[bi].q = [];
					for (; bg.zaraz.q.length;) {
						const bw = bg.zaraz.q.shift();
						bg[bi].q.push(bw)
					}
					bo.defer = !0;
					for (const bx of [localStorage, sessionStorage]) Object.keys(bx || {}).filter((bz => bz
						.startsWith("_zaraz_"))).forEach((by => {
						try {
							bg[bi]["z_" + by.slice(7)] = JSON.parse(bx.getItem(by))
						} catch {
							bg[bi]["z_" + by.slice(7)] = bx.getItem(by)
						}
					}));
					bo.referrerPolicy = "origin";
					bo.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bg[bi])));
					bn.parentNode.insertBefore(bo, bn)
				};
				["complete", "interactive"].includes(bh.readyState) ? zaraz.init() : bg.addEventListener(
					"DOMContentLoaded", zaraz.init)
			}(w, d, "zarazData", "script");
		})(window, document);
	</script>
</head>



<body class="hold-transition sidebar-mini">
	<div class="wrapper" id="wrapper">


		{{-- Navbar  --}}
		@include('layouts/inc_admin/navbar')
		{{-- Navbar  --}}

		{{-- Sidebar --}}
		@include('layouts/inc_admin/sidebar')
		{{-- Sidebar --}}

		<div class="content-wrapper">

			<div class="content-header">
				<div class="container-fluid mb-2">
					@yield('content-header')
				</div>
			</div>

			<div class="content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
		</div>

		<footer class="main-footer">

			<div class="float-right d-none d-sm-inline">
				Version 1.0
			</div>

			<strong>Copyright &copy; 2023 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
			reserved.
		</footer>
	</div>

	@yield('modal')

	<script src="/adminlte/plugins/jquery/jquery.min.js"></script>

	<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="/adminlte/dist/js/adminlte.min.js?v=3.2.0"></script>

	@stack('js')

</body>

</html>
