<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import the class namespaces first, before using it directly
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orden;
use App\Models\Carrito;
use App\Models\DetalleOrden;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'direccion_envio' => 'required|string|max:255',
            'total' => 'required|numeric|min:0.01',
        ]);
        $direccion_formulario = $request->input('direccion_envio');
        $total = $request->input('total');
        $request->session()->put('direccion_envio', $direccion_formulario);

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
               $estado_orden = 'Procesando';
               $direccion_envio = $request->session()->get('direccion_envio', 'No proporcionada');

               //Crear la orden en la base de datos
               DB::beginTransaction();

               try {
                // Crear la orden en la base de datos
                $orden = new Orden();
                $orden->usuario_id = $usuario_id;
                $orden->total = $total;
                $orden->divisa = $divisa;
                $orden->estado_pago = $estado_pago;
                $orden->estado_orden = $estado_orden;
                $orden->transaccion_id = $transaccion_id;
                $orden->direccion_envio = $direccion_envio;
                $orden->save();

                // Guardar los detalles de la orden
                $carritos =Carrito::where('usuario_id', $usuario_id)->get();
                foreach ($carritos as $item) {
                    $detalle = new DetalleOrden();
                    $detalle->orden_id = $orden->id;
                    $detalle->producto_id = $item->producto_id;
                    $detalle->cantidad = $item->cantidad;
                    $detalle->precio = $item->producto->precio_venta;
                    $detalle->save();

                    //Descontar el stock del producto
                    $producto = $item->producto;
                    $producto->stock -= $item->cantidad;
                    $producto->save();

                    //Eliminar el Producto del carrito
                    $item->delete();
                }
                DB::commit();
                return redirect()->route('web.paypal.orden_completado')->with('success', '¡Gracias por tu compra! El pago se ha completado exitosamente.');

               } catch (\Exception $e) {
                     DB::rollBack();
                     return redirect()->route('web.carrito.index')->with('info', 'Ocurrió un error al guardar la orden: ' . $e->getMessage());
               }


              // return redirect()->route('web.carrito.index')->with('success', '¡Gracias por tu compra! El pago se ha completado exitosamente.');
           } else {
               return redirect()->route('web.carrito.index')->with('info', 'El pago no se pudo completar. Por favor, intenta nuevamente.');
           }
       }catch (\Exception $e){
           return redirect()->route('web.carrito.index')->with('info', 'Ocurrió un error al procesar el pago: ' . $e->getMessage());
       }
    }
     public function orden_completado()
    {

       return view('web.orden_completado');
    }

    public function cancelar()
    {

    }

}
