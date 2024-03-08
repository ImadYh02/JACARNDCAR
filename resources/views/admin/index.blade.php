<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard | BigCar </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        @include('master.admin_nav')

        <!-- ========================= Main ==================== -->
        <div class="main">
            @include('master.admin_main')

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">{{$totalCars}}</div>
                        <div class="cardName">Car</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$totalUsers}}</div>
                        <div class="cardName">User</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$totalOrders}}</div>
                        <div class="cardName">Order</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">{{$totalCategories}}</div>
                        <div class="cardName">Category</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details" style="width: 150%">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="{{ route('admin.orders') }}" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Order Id</td>
                                <td>Car Name</td>
                                <td>User CIN</td>
                                <td>Method Payement</td>
                                <td>Total Price</td>
                                <td>Pick Up Location</td>
                                <td>Return Location</td>
                                <td>Pick In</td>
                                <td>Pick Up</td>
                                {{-- <td>Command Date</td> --}}
                                {{-- <td>Status</td> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($getOrders as $getOrder)
                                <tr>
                                    <td>{{ $getOrder['car_order_id'] }}</td>
                                    <td>{{ $getOrder['name_car'] }}</td>
                                    <td>{{ $getOrder['cin_user'] }}</td>
                                    <td>{{ $getOrder['methode_py'] }}</td>
                                    <td>{{ $getOrder['prix_total'] }}</td>
                                    <td>{{ $getOrder['pu_location'] }}</td>
                                    <td>{{ $getOrder['r_location'] }}</td>
                                    <td>{{ $getOrder['date_debut'] }}</td>
                                    <td>{{ $getOrder['date_fin'] }}</td>
                                    {{-- <td>{{ $getOrder['orders.created_at'] }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                {{-- <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        @foreach ($getUsers as $getUser)
                            <tr>
                                <td width="60px">
                                    <div class="imgBx"><img src="{{ asset('uploads/' . $getUser->profile_photo_path) }}" alt=""></div>
                                </td>
                                <td>
                                    <h4> {{$getUser['user_name']}} <br> <span> {{$getUser['email']}} </span></h4>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div> --}}
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
