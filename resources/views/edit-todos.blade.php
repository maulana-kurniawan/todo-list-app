@extends('layout.main')
@section('content')
<section class="vh-100">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-md-12 col-xl-10">
				<div class="text-center pb-3">
					<h1 class="my-4 h1 text-black">Edit Todo</h1>
				</div>
				<form action="{{ route('todos.update', $todo->id) }}" method="POST">
					@csrf
					@method('PUT')
					<div class="card">
						<div class="card-body">
							<div class="mb-3">
								<label for="todo" class="col-form-label">Task</label>
								<input type="text" class="form-control" id="todo" name="todo" value="{{ $todo->todo }}">
								@error('todo') <span class="text-danger">{{ $message }}</span> @enderror
							</div>
							<div class="mb-3">
								<label for="priority" class="col-form-label">Priority</label>
								<select class="form-select" id="priority" name="priority" value="{{ $todo->priority }}">
									<option selected hidden value="">Select</option>
									<option value="low" {{ old('priority', $todo->priority) === 'low' ? ' selected' : '' }}>Low</option>
									<option value="medium" {{ old('priority', $todo->priority) === 'medium' ? ' selected' : '' }}>Medium</option>
									<option value="high" {{ old('priority', $todo->priority) === 'high' ? ' selected' : '' }}>High</option>
								</select>
								@error('priority') <span class="text-danger">{{ $message }}</span> @enderror
							</div>
							<div class="mb-3">
								<label for="deadline_date" class="col-form-label">Deadline</label>
								<input type="date" class="form-control" id="deadline_date" name="deadline_date" value="{{ $todo->deadline_date }}">
								@error('deadline_date') <span class="text-danger">{{ $message }}</span> @enderror
							</div>
						</div>
						<div class="card-footer text-end">
							<a href="{{ route('todos.index') }}" type="button" class="btn btn-danger">Cancel</a>
							<button type="submit" class="btn btn-success">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
