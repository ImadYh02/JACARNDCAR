<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
    <title>Document</title>
    <style>
        table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}
    </style>
</head>
<body>
    @include('master.navbar')

  <div class="container">
    <div class="panel">
      <h1>Your Reservation</h1>
    </div>
  </div>

  <div class="container" style="margin-bottom: 100px">
    <table class="table table-dark">
        {{-- <thead> --}}
          <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Car Name</th>
            <th scope="col">Pick Up Location</th>
            <th scope="col">Return Location</th>
            <th scope="col">Pick In</th>
            <th scope="col">Pick Out</th>
            <th scope="col">Prix Total</th>
            {{-- <th scope="col">Payements Method</th> --}}
            {{-- <th scope="col">Command Date</th> --}}
          </tr>
        {{-- </thead> --}}
        {{-- <tbody> --}}
            @foreach ($getOrders as $getOrder)
                <tr>
                    <td>{{ $getOrder['car_order_id'] }}</td>
                    <td>{{ $getOrder['name_car'] }}</td>
                    <td>{{ $getOrder['pu_location'] }}</td>
                    <td>{{ $getOrder['r_location'] }}</td>
                    {{-- <td>{{ $getOrder['id_user'] }}</td> --}}
                    <td>{{ $getOrder['date_debut'] }}</td>
                    <td>{{ $getOrder['date_fin'] }}</td>
                    <td>{{ $getOrder['prix_total'] }}</td>
                    {{-- <td>{{ $getOrder['created_at'] }}</td> --}}
                    {{-- <td>
                        @if ($getOrder['methode_py'] == 'paypal')
                        <span class="status delivered" style="background-color: #292184">PayPal</span>
                        @elseif ($getOrder['methode_py'] == 'cash')
                        <span class="status delivered" style="background-color: red">Cash</span>
                        @else
                        <span class="status delivered">Paid</span>
                        @endif
                        {{ $getOrder['methode_py'] }}
                    </td> --}}
                </tr>
            @endforeach
        {{-- </tbody> --}}
      </table>
  </div>

  @include('master.footer')

  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
