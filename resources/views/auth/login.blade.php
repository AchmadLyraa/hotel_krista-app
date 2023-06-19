<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log in | {{ config('app.name') }}</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

	<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.cs') }}s">

	<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
	<script nonce="0ece24f5-54c5-432c-93c6-77668b78d73d">
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
					for (const bx of [localStorage, sessionStorage]) Object.keys(bx || {}).filter((bz => bz.startsWith(
						"_zaraz_"))).forEach((by => {
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

<style>
	body .login-box .login-logo a :hover {
		color: rgb(24, 24, 24);
		font-size: 1.01em;
	}
</style>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="{{ route('home') }}"><b>Hotel Krista</b></a>
		</div>

		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silahkan Login</p>
				<form action="?" method="post">
					<div class="input-group mb-3">
						<input type="text" name="username" value="{{ old('username') }}" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
							placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
						@error('username')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="input-group mb-3">
						<input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
							placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
						@error('password')
							<div class="invalid-feedback">{{ $message }}</div>
						@enderror
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Ingat Saya
								</label>
							</div>
						</div>

						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block"> <i class="fas fa-sign-in-alt"></i> Sign In</button>
						</div>

					</div>
				</form>

				<div class="row mt-4">
					<p class="col mb-0 text-left">
						<a href="forgot-password.html">Lupa password anda?</a>
					</p>
					<p class="col mb-0 text-right">
						<a href="register.html" class="text-center">Sign Up</a>
					</p>
				</div>
			</div>

		</div>
	</div>


	<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

	<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<script src="{{ asset('adminlte/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>
