<?php

namespace App\Http\Controllers;

use App\Models\Pagos;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    public function index(){
        return view("index", [
            "pagos" => Pagos::latest()->paginate()
        ]);
    }
}
