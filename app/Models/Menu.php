<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;

class Menu
{
	protected static function getfullMenu(string $active = null)
	{
		$items = array();

		$items[] = (object)array(
			'name' => 'Dashboard',
			'link' => route('index'),
			'icon' => 'fa-tachometer-alt',
		);

		$items[] = (object)array(
			'name' => 'Usuarios',
			'link' => route('users.index'),
			'icon' => 'fa-address-card',
		);

		// $items[] = (object)array(
		// 	'name' => 'Configuracion',
		// 	'link' => route('admin.config'),
		// 	'icon' => 'fa-cogs',
		// );

		$items[] = (object)array(
			'name' => 'Salir',
			'link' => route('logout'),
			'icon' => 'fa-sign-out-alt',
		);

		return $items;
	}

	protected static function generate_sidemenu(string $active = null)
	{
		$items = Menu::getfullMenu();

		foreach ($items as $k => $v) {
			if ($v->name == $active) $items[$k]->is_active = true;
		}

		return $items;
	}

	protected static function generate_header()
	{
		return (object)array(
			'title' => env('APP_NAME'),
		);
	}

	protected static function generate_footer()
	{
		return (object) null;
	}

	public static function generate(array $options = array())
	{
		$menu = (object)[];
		$menu->header = self::generate_header();

		$menu->sidemenu = isset($options['active']) ? self::generate_sidemenu($options['active']) : self::generate_sidemenu();

		$menu->navbar = isset($options['navbar']) ? $options['navbar'] : array();
		if (isset($options['content_title'])) {
			$menu->content_title = $options['content_title'];
		} elseif (isset($options['active'])) {
			$menu->content_title = $options['active'];
		} else {
			$menu->content_title = null;
		}

		$menu->breadcrumbs = isset($options['breadcrumbs']) ? $options['breadcrumbs'] : array();

		$menu->footer = self::generate_footer();

		return $menu;
	}
}