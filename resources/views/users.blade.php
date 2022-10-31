@extends('layout')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card card-outline card-info">
			<div class="card-header">
				<h3 class="card-title">Lista de Usuarios</h3>
				<div class="card-tools">
					<div class="input-group input-group-sm">
						<button type="button" class="btn btn-success" name="btn-create" data-bs-toggle="modal" data-bs-target="#modal-form">Agregar Usuario</button>
					</div>
				</div>
			</div>
			<div class="card-body p-0" style="height: 59vh; overflow:auto;">
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th class="text-center" style="width: 5%;">#</th>
							<th class="text-center" style="width: 5%;">Status</th>
							<th class="text-center" style="width: 10%;">Usuario</th>
							<th scope="col">Nombre</th>
							<th scope="col">E Mail</th>
							<th scope="col">Teléfono</th>
							<th class="text-center" style="width: 15%">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($users as $item)
						<tr>
							<td class="text-center">{{ $item->id }}</td>
							@switch($item->status)
							@case('0')
							<td class="text-center"><span class="badge badge-secondary">Inactivo</span></td>
							@break

							@case('200')
							<td class="text-center"><span class="badge badge-success">Activo</span></td>
							@break

							@case('2')
							<td class="text-center"><span class="badge badge-warning">Suspendido</span></td>
							@break

							@case('3')
							<td class="text-center"><span class="badge badge-warning">Bloqueado</span></td>
							@break

							@case('4')
							<td class="text-center"><span class="badge bg-black">Oculto</span></td>
							@break
							@endswitch
							<td class="text-center">{{ $item->user }}</td>
							<td>{{ $item->full_name }}</td>
							<td>{{ $item->email }}</td>
							<td>{{ $item->phone }}</td>
							<td class="text-center">
								<button type="button" class="btn btn-primary btn-sm" name="btn-edit" data-bs-toggle="modal" data-bs-target="#modal-form" data-id="{{ $item->id }}">Editar</button>
							</td>
						</tr>
						@empty
						<tr>
							<td class="text-center" colspan="5">
								<button type="button" class="btn btn-success" name="btn-create" data-bs-toggle="modal" data-bs-target="#modal-form">Nuevo Usuario</button>
							</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<form class="needs-validation" action="{{ route('users.store') }}" method="POST">
			@csrf
			@method('POST')
			<input type="hidden" id="action" name="action" value="create">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Agregar Usuario</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="form-group col-sm-4">
								<label for="">ID:</label>
								<input type="text" class="form-control" id="id" name="id" form="modal-form" readonly>
							</div>
							<div class="form-group col-sm-8">
								<label>Estado</label>
								<select class="form-control" id="status" name="status">
									<option value="200">Activo</option>
									<option value="0">Inactivo</option>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label for="">Usuario:</label>
								<input type="text" class="form-control" id="user" name="user" form="modal-form" placeholder="Usuario" autocomplete="false" required>
							</div>
							<div class="form-group col-sm-6">
								<label for="">Contraseña:</label>
								<input type="password" class="form-control" id="password" name="password" form="modal-form" placeholder="Contraseña" autocomplete="false">
							</div>
							<div class="form-group col-sm-4">
								<label for="">Nombre:</label>
								<input type="text" class="form-control" id="name" name="name" form="modal-form" placeholder="Nombre" autocomplete="false" required>
							</div>
							<div class="form-group col-sm-4">
								<label for="">Paterno:</label>
								<input type="text" class="form-control" id="last1" name="last1" form="modal-form" placeholder="Paterno" autocomplete="false" required>
							</div>
							<div class="form-group col-sm-4">
								<label for="">Materno:</label>
								<input type="text" class="form-control" id="last2" name="last2" form="modal-form" placeholder="Materno" autocomplete="false">
							</div>
							<div class="form-group col">
								<label for="">Email:</label>
								<input type="email" class="form-control" id="email" name="email" form="modal-form" placeholder="email" autocomplete="false">
							</div>
							<div class="form-group col">
								<label for="">Teléfono:</label>
								<input type="tel" class="form-control" id="phone" name="phone" form="modal-form" placeholder="## #### ####" autocomplete="false" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" name="btn-delete" disabled>Borrar</button>
					<button type="submit" class="btn btn-primary" name="btn-save">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(document).ready(function () {
		// Coloca datos JSON en sus respectivos campos
		function setData(data) {
			$('#id').val(data.id);
			$('#user').val(data.user);
			$('#name').val(data.name);
			$('#last1').val(data.last1);
			$('#last2').val(data.last2);
			$('#phone').val(data.phone);
			$('#email').val(data.email);

			//			$('button[name=btn-delete]').prop('disabled', false);
		};

		// Boton de creacion
		$('button[name=btn-create]').click(function() {
			$('#modal-form form').trigger('reset');
			$('#action').val('create');
			$('#modal-form input[name=_method]').val('POST');
		});

		// Boton de edicion
		$('button[name=btn-edit]').click(function() {
			$('#action').val('update');
			$('#modal-form input[name=_method]').val('PUT');
			$.get("{{ route('users.index') }}/" + $(this).data('id') + "/edit")
				.done(setData);
		});

		$('#modal-form').submit(function(e) {
			e.preventDefault();
			var url = "{{ route('users.index') }}";
			if ($('#action').val() === 'update') {
				url = url + "/" + $('#id').val();
			}
			$.post(url, $('#modal-form').serialize())
			.done(function(data) {
				if (data.success === 'ok') {
					$('#modal-create').hide();
					location.reload();
				} else if (data.success === 'error') {
					toastr.error(data.msg);
				}
			})
		});
	});
</script>
@endsection