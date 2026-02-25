<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;
class PaypalController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new PayPalClient;
        $this->provider->setApiCredentials(config('paypal'));
        $this->provider->getAccessToken();

    }

    public function pago(Request $request)
    {
       // return response()->json($request->all());
        $total = $request->input('total');
        $data =[
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('paypal.currency'),
                        'value' => number_format($total, 2, '.', '')
                    ]
                ]
            ],
            'application_context' => [
                'cancel_url' => route('web.paypal.cancelar'),
                'return_url' => route('web.paypal.gracias'),
            ]

        ];
        $response = $this->provider->createOrder($data);
        dd($response);
        /*try{
            $response = $this->provider->createOrder($data);
            if (isset($response['id']) && $response['id'] != null) {
                // Redirigir al usuario a PayPal para completar el pago
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
                return redirect()->route('web.carrito.index')->with('info', 'No se pudo procesar el pago.');
            } else {
                return redirect()->route('web.carrito.index')->with('info', 'No se pudo procesar el pago.');
            }
        }catch (\Exception $e){
            return redirect()->route('web.carrito.index')->with('info', 'Ocurrió un error al procesar el pago: ' . $e->getMessage());
        }*/
    }

    public function gracias() {}

    public function cancelar() {}
}
