<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Pedido Enviado: {{ $ajuste->nombre }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #1e293b;
        }

        .email-wrapper {
            width: 100%;
            background-color: #f8fafc;
            padding: 40px 0;
        }

        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .email-header {
            padding: 40px 32px;
            background: linear-gradient(135deg, #2563eb, #10b981);
            color: #ffffff;
            text-align: center;
        }

        .email-header h1 {
            margin: 0 0 12px;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        .email-header p {
            margin: 0;
            font-size: 16px;
            opacity: 0.9;
            font-weight: 500;
        }

        .badge-success {
            display: inline-block;
            margin-top: 20px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-radius: 999px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #ffffff;
        }

        .email-body {
            padding: 32px;
        }

        .section-title {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #64748b;
            margin-bottom: 12px;
            margin-top: 24px;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        .note-box {
            background-color: #f1f5f9;
            border-left: 4px solid #2563eb;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 24px;
        }

        .note-box p {
            margin: 0;
            font-style: italic;
            color: #334155;
            line-height: 1.6;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 32px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f1f5f9;
        }

        .summary-item {
            flex: 1;
        }

        .summary-label {
            display: block;
            font-size: 11px;
            color: #94a3b8;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .summary-value {
            font-weight: 700;
            color: #0f172a;
            font-size: 14px;
        }

        .info-grid {
            display: flex;
            gap: 24px;
            margin-bottom: 32px;
        }

        .info-col {
            flex: 1;
        }

        .info-card {
            font-size: 14px;
            line-height: 1.5;
            color: #475569;
        }

        .info-card strong {
            color: #1e293b;
            display: block;
            margin-bottom: 4px;
        }

        .table-wrapper {
            margin-top: 12px;
            border: 1px solid #f1f5f9;
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f8fafc;
            text-align: left;
            padding: 12px 16px;
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            border-bottom: 1px solid #f1f5f9;
        }

        td {
            padding: 16px;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .product-name {
            font-weight: 600;
            color: #1e293b;
        }

        .text-right {
            text-align: right;
        }

        .totals {
            margin-top: 24px;
            border-top: 2px solid #f1f5f9;
            padding-top: 16px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
        }

        .email-footer {
            padding: 40px 32px;
            background-color: #f8fafc;
            text-align: center;
            border-top: 1px solid #f1f5f9;
        }

        .email-footer p {
            margin: 0 0 8px;
            font-size: 13px;
            color: #94a3b8;
        }

        .brand {
            font-weight: 700;
            color: #2563eb;
            font-size: 16px;
            margin-bottom: 12px !important;
        }

        @media (max-width: 600px) {
            .info-grid {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h1>¡Tu pedido está en camino!</h1>
                <p>Hola <strong>{{ $orden->usuario->name }}</strong>, tenemos excelentes noticias.</p>
                <div class="badge-success">Enviado</div>
            </div>

            <div class="email-body">
                <div class="section-title">Detalles del Envío</div>
                <div class="note-box">
                    {!! $orden->nota !!}
                </div>

                <div class="summary">
                    <div class="summary-item">
                        <span class="summary-label">Nro. de Pedido</span>
                        <span class="summary-value">#{{ $orden->id }}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Fecha</span>
                        <span class="summary-value">{{ $orden->created_at->format('d/m/Y') }}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Estado</span>
                        <span class="summary-value">{{ $orden->estado_orden }}</span>
                    </div>
                </div>

                <div class="info-grid">
                    <div class="info-col">
                        <div class="section-title">Datos del Cliente</div>
                        <div class="info-card">
                            <strong>{{ $orden->usuario->name }}</strong>
                            {{ $orden->usuario->email }}
                        </div>
                    </div>
                    <div class="info-col">
                        <div class="section-title">Dirección de Envío</div>
                        <div class="info-card">
                            {{ $orden->direccion_envio }}
                        </div>
                    </div>
                </div>

                <div class="section-title">Detalles de la Orden</div>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th class="text-right">Cant.</th>
                                <th class="text-right">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orden->detalles as $detalle)
                                <tr>
                                    <td>
                                        <div class="product-name">{{ $detalle->producto->nombre }}</div>
                                    </td>
                                    <td class="text-right">{{ $detalle->cantidad }}</td>
                                    <td class="text-right">
                                        {{ number_format($detalle->precio, 2) }} {{ $detalle->divisa }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="totals">
                    <div class="total-row">
                        <span>Total</span>
                        <span>
                            {{ number_format($orden->total, 2) }} {{ $orden->detalles->first()->divisa ?? '' }}
                        </span>
                    </div>
                </div>

                <p style="font-size: 13px; margin-top: 32px; text-align: center; color: #94a3b8;">
                    Si tienes alguna duda o necesitas ayuda con tu pedido, no dudes en contactarnos respondiendo a este correo.
                </p>
            </div>

            <div class="email-footer">
                <p class="brand">{{ $ajuste->nombre }}</p>
                <p>{{ $ajuste->direccion }} | {{ $ajuste->telefono }}</p>
                <p>&copy; {{ date('Y') }} {{ $ajuste->nombre }}. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>

</html>

