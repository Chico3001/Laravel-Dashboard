@extends('back.layout')

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
			<div class="card-body p-0" style="height: 62vh; overflow:auto;">
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							{{-- <th class="text-center" style="width: 5%;">#</th> --}}
							<th class="text-center" style="width: 8vw;">Status</th>
							<th class="text-center">Usuario</th>
							<th class="text-center" style="width: 9vw;">Nivel</th>
							<th class="text-center">Nombre</th>
							<th class="text-center">E Mail</th>
							<th class="text-center">Teléfono</th>
							<th class="text-center" style="width: 7vw;">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($users as $item)
						<tr>
							{{-- <td class="text-center">{{ $item->id }}</td> --}}
							<td class="text-center">@include('utils.GeneralStatus')</td>
							<td class="text-center">{{ $item->user }}</td>
							<td class="text-center">@include('utils.UserLevels')</td>
							<td>{{ $item->full_name }}</td>
							<td>{{ $item->email }}</td>
							<td>{{ $item->phone }}</td>
							<td class="text-center">
								<button type="button" class="btn btn-primary btn-sm" name="btn-edit" data-bs-toggle="modal" data-bs-target="#modal-form" data-id="{{ $item->id }}"><i class="fas fa-pen-to-square"></i></button>
								<button type="button" class="btn btn-danger btn-sm" name="btn-delete" data-bs-toggle="modal" data-bs-target="#modal-delete" data-id="{{ $item->id }}"><i class="fas fa-trash-can"></i></button>
							</td>
						</tr>
						@empty
						<tr>
							<td class="text-center" colspan="4">
								<button type="button" class="btn btn-success" name="btn-create" data-bs-toggle="modal" data-bs-target="#modal-form">Agregar Usuario</button>
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
								<input type="text" class="form-control" id="id" name="id" readonly>
							</div>
							<div class="form-group col-sm-4">
								<label>Estado</label>
								<select class="form-control" id="status" name="status">
									<option value="{{App\Enums\UserStatus::ENABLED}}">Activo</option>
									<option value="{{App\Enums\UserStatus::DISABLED}}">Inactivo</option>
								</select>
							</div>
							<input type="hidden" name="level" value="{{App\Enums\UserLevels::USER}}">
							<div class="form-group col-sm-6">
								<label for="">Usuario:</label>
								<input type="text" class="form-control" id="user" name="user" placeholder="Usuario" autocomplete="false" required>
							</div>
							<div class="form-group col-sm-6">
								<label for="">Contraseña:</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" autocomplete="false">
							</div>
							<div class="form-group col-sm-4">
								<label for="">Nombre:</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Nombre" autocomplete="false" required>
							</div>
							<div class="form-group col-sm-4">
								<label for="">Paterno:</label>
								<input type="text" class="form-control" id="last1" name="last1" placeholder="Paterno" autocomplete="false" required>
							</div>
							<div class="form-group col-sm-4">
								<label for="">Materno:</label>
								<input type="text" class="form-control" id="last2" name="last2" placeholder="Materno" autocomplete="false">
							</div>
							<div class="form-group col">
								<label for="">Email:</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="email" autocomplete="false">
							</div>
							<div class="form-group col">
								<label for="">Teléfono:</label>
								<input type="tel" class="form-control" id="phone" name="phone" placeholder="## #### ####" autocomplete="false">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" name="btn-save">Guardar</button>
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
		};

		// Boton de creacion
		$('button[name=btn-create]').click(function() {
			$('#action').val('create');
			$('#modal-form input[name=_method]').val('POST');
			$('#modal-form form').trigger('reset');
		});

		// Boton de edicion
		$('button[name=btn-edit]').click(function() {
			$('#action').val('update');
			$('#modal-form input[name=_method]').val('PUT');
			$.get("{{ route('users.index') }}/" + $(this).data('id') + "/edit")
				.done(setData);
		});

		// Boton de borrado
		$('button[name=btn-delete]').click(function() {
			$.post("{{ route('users.index') }}" + '/' + $(this).data('id'), {
				'_token': $('input[name=_token]').val(),
				'_method': 'DELETE',
				'id': $(this).data('id')
			})
			.done(function(data) {
				$('#modal-form').modal('hide');
				if (data.success === 'ok') {
					toastr.success(data.msg);
					setTimeout(() => {
						location.reload();
					}, 2000);
				} else if (data.success === 'error') {
					toastr.error(data.msg);
				}
			})
		});

		// Boton de guardado
		$('button[name=btn-save]').click(function() {
			// Valida Formulario
			if($('#modal-form form')[0].reportValidity()){
				var url = "{{ route('users.index') }}";
				if ($('#action').val() === 'update') {
					url = url + "/" + $('#id').val();
				}

				$.post(url, $('#modal-form form').serialize())
				.done(function(data) {
					$('#modal-form').modal('hide');
					if (data.success === 'ok') {
						toastr.success(data.msg);
						setTimeout(() => {
							location.reload();
						}, 2000);
					} else if (data.success === 'error') {
						toastr.error(data.msg);
					}
				})
			}
		});

});
</script>
@endsection