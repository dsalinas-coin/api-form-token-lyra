<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Pagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FormTokenController extends Controller
{
    private $user = "45492701";
    private $pass = "testpassword_qn4sABJKvyz26Jcokm0mqzo5QRUy41li9wezFdU794Oue";

    public function store(Request $request)
    {
        $public_key = base64_encode($this->user . ":" . $this->pass);

        $payload = array(
            "amount" =>   intval($request->precio),
            "currency" => "ARS",
            "orderId" => intval($request->orderId),
	        "customer" => array(
                "email" => "dsalinas@cobroinmediato.tech")
        );

        $response = Http::withHeaders([
            "Content-Type" => "application/json",
            "Authorization" => "Basic " . $public_key
        ])->post(
            'https://api.cobroinmediato.tech/api-payment/V4/Charge/CreatePayment', $payload);

        $content = $response->body();
        $data = json_decode($content);
        $token = $data->answer->formToken;

        if($data->status == "SUCCESS"){

            return ['formToken' => $token];
        };

    }
}
