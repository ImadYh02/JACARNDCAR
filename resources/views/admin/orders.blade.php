<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard | BigCar </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        @include('master.admin_nav')

        <!-- ========================= Main ==================== -->
        <div class="main">
            @include('master.admin_main')
            <!-- ================ Order Details List ================= -->
            <a style="
            cursor: pointer;
            margin:460px;
            background-color: #292184;
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none"
            class="btn" type="submit" onclick="print()">Print</a>
            <div class="details">
                <div class="recentOrders" style="width: 150%">
                    @if ($message = Session::get('success'))
                    <div class="container">
                        <div class="message">
                            <div class="alert">
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                    <div class="cardHeader">
                    @endif
                    <div class="cardHeader">
                        <h2> All Orders </h2>
                        <a href="{{ route('admin.addOrder') }}" class="btn">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                {{-- <td>Order Id</td> --}}
                                {{-- <td>CIN User</td> --}}
                                <td>Number Transaction</td>
                                <td>Car Name</td>
                                {{-- <td>User Id</td> --}}
                                <td>Pick Up Location</td>
                                <td>Return Location</td>
                                <td>Check In</td>
                                <td>Check Out</td>
                                <td>Prix Total</td>
                                <td>Payements</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($getOrders as $getOrder)
                                <tr>
                                    {{-- <td>{{ $getOrder['car_order_id'] }}</td> --}}
                                    {{-- <td>{{ $getOrder['cin_user'] }}</td> --}}
                                    <td>{{ $getOrder['trans_number'] }}</td>
                                    <td>{{ $getOrder['name_car'] }}</td>
                                    <td>{{ $getOrder['pu_location'] }}</td>
                                    <td>{{ $getOrder['r_location'] }}</td>
                                    {{-- <td>{{ $getOrder['id_user'] }}</td> --}}
                                    <td>{{ $getOrder['date_debut']->toDateString() }}</td>
                                    <td>{{ $getOrder['date_fin']->toDateString() }}</td>
                                    <td>{{ $getOrder['prix_total'] }}</td>
                                    <td>
                                        @if ($getOrder['methode_py'] == 'paypal')
                                        <span class="status delivered" style="background-color: #292184">PayPal</span>
                                        @elseif ($getOrder['methode_py'] == 'cash')
                                        <span class="status delivered" style="background-color: orange">Cash</span>
                                        @elseif ($getOrder['methode_py'] == 'cancelled')
                                        <span class="status delivered" style="background-color: red">Cancelled</span>
                                        @elseif ($getOrder['methode_py'] == 'paid')
                                        <span class="status delivered" style="background-color: green">Paid</span>
                                        @endif
                                        {{-- {{ $getOrder['methode_py'] }} --}}
                                    </td>
                                    <td>
                                        <form action="{{ route('order.delete', $getOrder['car_order_id']) }}" method="POST">
                                            <a href="{{ route('admin.editOrder', $getOrder['car_order_id']) }}" class="btn" style="color: #292184; padding: 12px 16px;
                                            font-size: 16px; background-color: white"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="
                                            background-color: white;
                                            border: none;
                                            color: #292184;
                                            padding: 12px 16px;
                                            font-size: 16px;
                                            cursor: pointer;
                                            "><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src={{asset('admin_assets/js/main.js')}}></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
