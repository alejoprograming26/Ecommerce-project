<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orden;
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

        try{
            $response = $this->provider->createOrder($data);
            if (isset($response['id']) && $response['status'] === 'CREATED') {
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
        }
    }

    public function gracias(Request $request)
    {
        $usuario_id = Auth::user()->id;
        $token = $request->input('token');

       try {
           $response = $this->provider->capturePaymentOrder($token);
           if (isset($response['status']) && $response['status'] === 'COMPLETED')
            {
                //dd($response);
               // Aquí puedes realizar acciones adicionales, como guardar la información del pedido en tu base de datos
             $DatosPago = $response['purchase_units'][0]['payments']['captures'][0];
                $total = $DatosPago['amount']['value'];
                $transaccion_id = $DatosPago['id'];
                $estado_pago = $DatosPago['status'];
                $divisa = $DatosPago['amount']['currency_code'];

               return redirect()->route('web.carrito.index')->with('success', '¡Gracias por tu compra! El pago se ha completado exitosamente.');
           } else {
               return redirect()->route('web.carrito.index')->with('info', 'El pago no se pudo completar. Por favor, intenta nuevamente.');
           }
       }catch (\Exception $e){
           return redirect()->route('web.carrito.index')->with('info', 'Ocurrió un error al procesar el pago: ' . $e->getMessage());
       }
    }

    public function cancelar()
    {

    }
}
