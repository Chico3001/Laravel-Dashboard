@inject('status', 'App\Enums\GeneralStatus')

@switch($item->status)
@case($status::ENABLED)
<span class="badge text-bg-success">Activo</span>
@break
@default
<span class="badge text-bg-danger">Inactivo</span>
@endswitch