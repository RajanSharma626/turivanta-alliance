<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $invoice_no }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 40px;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            border-bottom: 2px solid #ff014f;
            padding-bottom: 20px;
        }
        .logo {
            font-size: 28px;
            font-weight: 900;
            color: #ff014f;
            text-transform: uppercase;
            letter-spacing: -1px;
        }
        .invoice-title {
            text-align: right;
            font-size: 32px;
            font-weight: 900;
            text-transform: uppercase;
            color: #111;
        }
        .details-container {
            width: 100%;
            margin-bottom: 40px;
        }
        .details-container td {
            vertical-align: top;
        }
        .info-label {
            font-size: 10px;
            font-weight: 900;
            color: #999;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 3px;
        }
        .info-value {
            font-size: 14px;
            font-weight: 700;
            color: #111;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }
        .table th {
            background: #f8f8f8;
            padding: 15px;
            text-align: left;
            font-size: 10px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 1px solid #eee;
        }
        .table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        .item-name {
            font-weight: 700;
            color: #111;
            font-size: 15px;
        }
        .item-desc {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
        .total-section {
            margin-top: 40px;
            float: right;
            width: 250px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .total-row.grand-total {
            border-bottom: none;
            background: #ff014f;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .footer {
            margin-top: 100px;
            text-align: center;
            font-size: 12px;
            color: #999;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        .badge {
            color: #10b981;
            font-size: 13px;
            font-weight: 900;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table style="width: 100%; margin-bottom: 40px;">
            <tr>
                <td class="logo">TURIVANTA<br><span style="color: #333; font-size: 14px; font-weight: 700; letter-spacing: 2px;">ALLIANCE</span></td>
                <td class="invoice-title">Invoice</td>
            </tr>
        </table>

        <div style="border-bottom: 2px solid #ff014f; margin-bottom: 30px;"></div>

        <table class="details-container">
            <tr>
                <td style="width: 50%;">
                    <div class="info-label">Billed To</div>
                    <div class="info-value">{{ $user->name }}</div>
                    <div style="font-size: 12px; color: #666;">
                        GTIN: {{ $user->membership_id }}<br>
                        {{ $user->email }}<br>
                        {{ $user->contact_no }}<br>
                        Business: {{ $user->business_type }}
                    </div>
                </td>
                <td style="width: 50%; text-align: right;">
                    <div class="info-label">Invoice Details</div>
                    <div class="info-value">{{ $invoice_no }}</div>
                    <div style="font-size: 12px; color: #666; line-height: 1.8;">
                        Date: {{ $date }}<br>
                        Status: <span class="badge" style="margin-left: 2px;">PAID</span>
                    </div>
                </td>
            </tr>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: center;">Duration</th>
                    <th style="text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="item-name">Membership Subscription: {{ $subscription->plan_name }}</div>
                        <div class="item-desc italic">
                            Valid from {{ $subscription->starts_at->format('M d, Y') }} to {{ $subscription->expires_at->format('M d, Y') }}
                        </div>
                    </td>
                    <td style="text-align: center;">1 Year</td>
                    <td style="text-align: right; font-weight: 700;">{{ $subscription->currency }} {{ number_format($subscription->price, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 30px; border-top: 2px solid #eee; padding-top: 20px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 60%;">
                        <div class="info-label">Note</div>
                        <div style="font-size: 12px; color: #666;">
                            This is a computer generated invoice for your membership with Turivanta Alliance.
                            For any queries, please contact info@turivanta.com
                        </div>
                    </td>
                    <td style="width: 40%;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="font-size: 12px; font-weight: 700;">Subtotal</td>
                                <td style="text-align: right; font-weight: 700;">{{ $subscription->currency }} {{ number_format($subscription->price, 2) }}</td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px; font-weight: 700;">Tax (0%)</td>
                                <td style="text-align: right; font-weight: 700;">{{ $subscription->currency }} 0.00</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding-top: 15px;">
                                    <div style="padding: 10px 0; border-top: 2px solid #111; display: flex; justify-content: space-between; align-items: center;">
                                        <span style="font-size: 11px; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; color: #111;">Amount Paid</span>
                                        <span style="font-size: 20px; font-weight: 900; float: right; color: #111;">{{ $subscription->currency }} {{ number_format($subscription->price, 2) }}</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="footer">
            <strong>Turivanta Alliance</strong><br>
            turivanta.com | info@turivanta.com<br>
            Global Travel Industry Network
        </div>
    </div>
</body>
</html>
