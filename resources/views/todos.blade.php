@extends('layout.main')
@section('content')
<section class="vh-100">
	<div class="container py-5 h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-md-12 col-xl-10">
				<div class="text-center pb-3">
					<h1 class="my-4 h1 text-black">Task List</h1>
					<a href="{{ route('todos.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Add new task"><i class="fas fa-circle-plus fa-lg me-2"></i>Add new task</a>
				</div>
				<div class="card">
					<div class="card-body">
						<table id="tabel" class="table table-hover table-bordered mb-0">
							<thead class="fw-bold">
								<tr>
									<th scope="col" class="text-center">#</th>
									<th scope="col" class="text-center">Task</th>
									<th scope="col" class="text-center">Priority</th>
									<th scope="col" class="text-center">Deadline</th>
									<th scope="col" class="text-center">Status</th>
									<th scope="col" class="text-center">Options</th>
								</tr>
							</thead>
							<tbody class="table-group-divider align-middle">
								@foreach ($todos as $todo)
																<tr>
																	<th class="text-center">
																		<span>{{ $loop->iteration }}.</span>
																	</th>
																	<td class="text-break {{ $todo->status == 'done' ? 'text-decoration-line-through' : 'text-decoration-none' }}">
																		<span>{{ $todo->todo }}</span>
																	</td>
																	<td class="text-center">
																		<h5>
																			<span class="badge text-uppercase {{ $todo->priority == 'low' ? 'bg-success' : ($todo->priority == 'medium' ? 'bg-warning' : 'bg-danger') }}">
																				{{ $todo->priority }}
																			</span>
																		</h5>
																	</td>
																	<td class="text-center">
																		@php
																			$deadline = \Carbon\Carbon::parse($todo->deadline_date);
																			$now = \Carbon\Carbon::now();
																			$remaining = $now->diffInDays($deadline, false);
																		@endphp
																		<span>{{ $deadline->translatedFormat('j F Y') }}</span><br>
																		@if($remaining < 0)
																			<span class="text-danger fw-bold">Deadline has passed.</span>
																		@else
																			<span class="text-success">{{ round($remaining) }} days remaining.</span>
																		@endif
																	</td>
																	<td class="text-center text-white {{ $todo->status == 'done' ? 'bg-success' : 'bg-warning' }}">
																		<span class="text-uppercase fw-bold">{{ $todo->status }}</span>
																	</td>
																	<td class="text-center">
																		<form action="{{ route('todos.markAsDone', $todo->id) }}" method="POST" style="display:inline;">
																			@csrf
																			@method('PATCH')
																			<button type="submit" class="btn" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Mark as done"><i class="fas fa-square-check fa-lg text-success me-2"></i></button>
																		</form>
																		<a href="{{ route('todos.edit', $todo->id) }}" type="button" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="fas fa-edit fa-lg text-primary me-2"></i></a>
																		<form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
																			@csrf
																			@method('DELETE')
																			<button type="submit" class="btn" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete"><i class="fas fa-trash fa-lg text-danger"></i></button>
																		</form>
																	</td>
																</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Task</th>
									<th>Priority</th>
									<th>Deadline</th>
									<th>Status</th>
									<th>Options</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
