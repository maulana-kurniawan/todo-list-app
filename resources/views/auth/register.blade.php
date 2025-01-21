@extends('layout.auth')
@section('content')
<section class="vh-100">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-6">
				<div class="text-center pb-3">
					<h1 class="my-4 h1 text-black">Register</h1>
				</div>
				<form action="{{ route('register.submit') }}" method="POST">
					@csrf
					<div class="card">
						<div class="card-body">
							<div class="mb-3">
								<label for="name" class="col-form-label">Name</label>
								<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
								@error('email') <span class="text-danger">{{ $message }}</span> @enderror
							</div>
							<div class="mb-3">
								<label for="email" class="col-form-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
								@error('password') <span class="text-danger">{{ $message }}</span> @enderror
							</div>
							<div class="mb-3">
								<label for="password" class="col-form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password" required>
								@error('password') <span class="text-danger">{{ $message }}</span> @enderror
							</div>
							<div class="mb-3">
								<label for="password" class="col-form-label">Password Confirmation</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
							</div>
							<div class="d-grid gap-2 pt-3">
								<button type="submit" class="btn btn-success">Register</button>
								<a href="{{ route('login') }}" class="btn btn-primary">Back to login</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
