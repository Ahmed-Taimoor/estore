<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            margin: 0 0;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;

        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }



        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>


<body>
    <header class="clearfix">
        <div id="logo">
            <img src="{{ public_path() . '/assets/images/logo.png' }}" alt="Logo">
        </div>
        <h1>{{ 'Invoice' }}</h1>
        <div id="company" class="clearfix">
            <div>{{ \Carbon\Carbon::parse($order['created_at'])->format('d F Y') }}
            </div>

        </div>
        <div id="project">
            <div><span>Order ID</span> {{ $order['id'] }}</div>
            <div><span>Status</span> {{ $order['status'] }}</div>
            <div><span>Payment Status</span> {{ $order['payment_status'] }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">SERVICE</th>
                    <th class="desc">DESCRIPTION</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    <tr>
                        <td class="service">Design</td>
                        <td class="desc">{{ $p->product_name }}</td>
                        <td class="qty">{{ $p->quantity }}</td>
                        <td class="total">${{ $p->subTotal }}</td>
                    </tr>
                @endforeach


                <tr>
                    <td colspan="3">SUBTOTAL</td>
                    <td class="total">${{ $order['total'] }}</td>
                </tr>

                <tr>
                    <td colspan="3" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">${{ $order['total'] }}</td>
                </tr>
            </tbody>
        </table>

    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>

</html>
