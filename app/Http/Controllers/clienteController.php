<?php

namespace App\Http\Controllers;

use App\Models\clientes;


class clienteController extends Controller
{
    public function index()
    {
        $cliente = clientes::all();
        return view("admin.clientes")->with(array("cliente" => $cliente));
    }
}
