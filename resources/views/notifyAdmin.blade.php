<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #fff;
            color: #000;
        }

        main {
            margin: auto;
            width: 80%;
        }

        main .header {
            background-color: #d8aa1e;
            height: 60px;
            width: 100%;
        }

        main .header h1 {
            text-transform: capitalize;
            padding: 10px 20px;
        }

        main .header h1 .brand {
            font-size: 23px;
            text-transform: uppercase;
            color: #000;
        }

        main .content {
            margin-top: 10px;
            font-size: 17px;
        }

        main .content .info-order {
            color: #d8aa1e
        }

        .button {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button a {
            text-align: center;
            text-decoration: none;
            background-color: #d8aa1e;
            color: #fff;
            padding: 10px;
            width: 120px;
            height: 40px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <main>
        <div class="header">
            <h1>New Order.</h1>
        </div>
        <div class="content">
            <pre>
                Congrats! You just got a new order in <span style="text-transform: uppercase;">JACARANDCAR</span>
                <span class="info-order">[Order {{$order->trans_number}}] (@php echo date("Y/m/d"); @endphp)</span>
            </pre>
        </div>
        <div class="button">
          <a href="{{ route('admin.orders') }}" style="margin: auto;"> Cheek Now !</a>
        </div>
    </main>
</body>
</html>

</body>
</html>
