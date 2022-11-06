@inject('levels', 'App\Enums\UserLevels')

@switch($item->level)
@case($levels::SUPER)
<span class="badge text-bg-danger">Super Usuario</span>
@break
@case($levels::USER)
<span class="badge text-bg-success">Usuario</span>
@break
@default
<span class="badge text-bg-secondary">Desconocido</span>
@endswitch