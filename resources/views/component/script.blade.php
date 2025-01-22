<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/all.min.js') }}"></script>
<script>
		new DataTable('#tabel', {
				columnDefs: [{
						orderable: false,
						targets: [0, 1, 5]
				}],
				paging: true,
				lengthChange: false,
				searching: true,
				ordering: true,
				info: true,
				autoWidth: false,
				responsive: true,
				pageLength: 10,
				language: {
						url: '{{ asset('assets/js/datatables-id.json') }}',
				},
				initComplete: function() {
						this.api()
								.columns([2, 3, 4])
								.every(function() {
										let column = this;
										let title = column.footer().textContent;

										let input = document.createElement('input');
										input.classList.add('form-control');
										input.placeholder = title;
										column.footer().replaceChildren(input);

										input.addEventListener('keyup', () => {
												if (column.search() !== this.value) {
														column.search(input.value).draw();
												}
										});
								});
				},
				fixedHeader: {
						footer: true,
				},
		});
		const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
		const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
@if (session('success'))
		<script>
				Swal.fire({
						icon: 'success',
						title: 'Success',
						text: '{{ session('success') }}',
						toast: true,
						showConfirmButton: false,
						position: 'top',
						timer: 3000,
				});
		</script>
@endif
