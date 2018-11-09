<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistribuidorController extends Controller
{
	public function __construct()
	{
			$this->middleware('auth');
	}

	public function crudUsuarios()
	{

			return view('backend.distribuidores.crud-usuarios');
	}
	public function perfilUsuarios()
	{

			return view('backend.distribuidores.perfil-distribuidor');
	}
	public function indexUsuarios()
	{

			return view('backend.distribuidores.lista-distribuidores');
	}
	public function ventasListaProductos()
	{

			return view('backend.distribuidores.ventas-lista-productos');
	}
	public function ventasListaVendedores()
	{

			return view('backend.distribuidores.ventas-lista-vendedores');
	}
	public function ventasVendedorPerfil()
	{

			return view('backend.distribuidores.ventas-vendedores-perfil');
	}
}
