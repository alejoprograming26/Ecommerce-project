<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibo de Compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f7;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #333333;
        }

        .email-wrapper {
            width: 100%;
            background-color: #f4f4f7;
            padding: 24px 0;
        }

        .email-content {
            max-width: 640px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.12);
            overflow: hidden;
        }

        .email-header {
            padding: 24px 32px;
            background: linear-gradient(135deg, #0d6efd, #20c997);
            color: #ffffff;
            text-align: center;
        }

        .email-header h1 {
            margin: 0 0 8px;
            font-size: 24px;
            letter-spacing: 0.03em;
        }

        .email-header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .badge-success {
            display: inline-block;
            margin-top: 12px;
            padding: 4px 10px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            border-radius: 999px;
            background-color: rgba(12, 148, 136, 0.16);
            border: 1px solid rgba(209, 250, 229, 0.8);
            color: #e7f8f1;
        }

        .email-body {
            padding: 24px 32px 28px;
        }

        .section-title {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #6c757d;
            margin-bottom: 8px;
        }

        .summary {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 16px;
        }

        .summary-item {
            min-width: 140px;
            font-size: 13px;
        }

        .summary-label {
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .summary-value {
            font-weight: 600;
            color: #212529;
        }

        .customer-block,
        .shipping-block {
            font-size: 13px;
            margin-bottom: 18px;
        }

        .customer-block p,
        .shipping-block p {
            margin: 0 0 2px;
        }

        .table-wrapper {
            margin: 16px 0 8px;
            border-radius: 10px;
            border: 1px solid #e9ecef;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            background-color: #f8f9fa;
            text-align: left;
            padding: 10px 12px;
            font-weight: 600;
            color: #495057;
            border-bottom: 1px solid #e9ecef;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #f1f3f5;
            vertical-align: top;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .text-right {
            text-align: right;
        }

        .product-name {
            font-weight: 500;
            margin-bottom: 2px;
        }

        .product-meta {
            color: #6c757d;
            font-size: 12px;
        }

        .totals {
            margin-top: 8px;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            margin-top: 4px;
        }

        .totals-row.total {
            font-size: 15px;
            font-weight: 700;
            margin-top: 8px;
            padding-top: 6px;
            border-top: 1px dashed #dee2e6;
        }

        .text-muted {
            color: #6c757d;
        }

        .email-footer {
            padding: 18px 32px 8px;
            text-align: center;
            font-size: 11px;
            color: #8a8f98;
        }

        .email-footer p {
            margin: 0 0 4px;
        }

        .brand {
            font-weight: 600;
            color: #0d6efd;
        }

        @media (max-width: 600px) {
            .email-content {
                border-radius: 0;
            }

            .email-header,
            .email-body,
            .email-footer {
                padding-left: 18px;
                padding-right: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h1>Recibo de compra</h1>
                <p>Gracias por confiar en nosotros. Tu pago se ha procesado correctamente.</p>
                <span class="badge-success">Compra confirmada</span>
            </div>

            <div class="email-body">
                <p style="font-size: 14px; margin-top: 0; margin-bottom: 16px;">
                    Hola
                    <strong>{{ $orden->usuario->name ?? 'Cliente' }}</strong>,<br>
                    te compartimos el resumen de tu pedido. Guarda este correo como comprobante de tu compra.
                </p>

                <div class="summary">
                    <div class="summary-item">
                        <span class="summary-label">Nº de pedido</span>
                        <span class="summary-value">#{{ $orden->id }}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Fecha</span>
                        <span class="summary-value">
                            {{ \Carbon\Carbon::parse($orden->created_at)->format('d/m/Y H:i') }}
                        </span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Importe total</span>
                        <span class="summary-value">
                            {{ $orden->divisa . ' ' . number_format($orden->total, 2) }}
                        </span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Método de pago</span>
                        <span class="summary-value">PayPal</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Estado</span>
                        <span class="summary-value">{{ ucfirst($orden->estado_orden) }}</span>
                    </div>
                </div>

                <div class="customer-block">
                    <div class="section-title">Datos del cliente</div>
                    <p><strong>{{ $orden->usuario->name ?? 'Cliente' }}</strong></p>
                    <p class="text-muted">{{ $orden->usuario->email ?? 'Correo no disponible' }}</p>
                </div>

                <div class="shipping-block">
                    <div class="section-title">Dirección de envío</div>
                    <p>{{ $orden->direccion_envio ?? 'No se proporcionó dirección de envío.' }}</p>
                </div>

                <div class="section-title" style="margin-top: 20px;">Detalle de la compra</div>

                <div class="table-wrapper">
                    <table role="presentation">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th class="text-right">Cantidad</th>
                                <th class="text-right">Precio</th>
                                <th class="text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orden->detalles as $detalle)
                                @php
                                    $imagenProducto = $detalle->producto->imagenes->first();
                                    $imagen = $imagenProducto->imagen ?? null;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="product-name">{{ $detalle->producto->nombre }}</div>
                                    </td>
                                    <td class="text-right">
                                        {{ $detalle->cantidad }}
                                    </td>
                                    <td class="text-right">
                                        {{ $orden->divisa . ' ' . number_format($detalle->precio, 2) }}
                                    </td>
                                    <td class="text-right">
                                        {{ $orden->divisa . ' ' . number_format($detalle->cantidad * $detalle->precio, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="totals">
                    <div class="totals-row total">
                        <span>Total pagado</span>
                        <span>{{ $orden->divisa . ' ' . number_format($orden->total, 2) }}</span>
                    </div>
                </div>

                <p style="font-size: 12px; margin-top: 18px;" class="text-muted">
                    Si tienes alguna consulta o detectas información incorrecta en tu pedido, por favor responde a este
                    correo o contáctanos a través de nuestros canales de atención.
                </p>
            </div>

            <div class="email-footer">
                <p class="brand">{{ config('app.name', 'Tu Tienda Online') }}</p>
                <p>Este mensaje se generó automáticamente. Por favor, no respondas a este correo si no es necesario.</p>
            </div>
        </div>
    </div>
</body>

</html>
