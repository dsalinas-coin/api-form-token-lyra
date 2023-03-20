<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Pagos;
use Illuminate\Http\Request;

class PagosController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $pagos = Pagos::findOrFail($request->id);

        return $pagos;
    }
}
