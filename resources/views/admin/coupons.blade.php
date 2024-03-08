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
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders" style="width: 150%">
                    <div class="cardHeader">
                        <h2> All Coupons </h2>
                        <a href="{{ route('admin.addCoupon') }}" class="btn">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Coupon Id</td>
                                <td>The Coupon</td>
                                <td>The Number</td>
                                <td>Date Exp</td>
                                {{-- <td>Status</td> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($getCoupons as $getCoupon)
                                <tr>
                                    <td>{{ $getCoupon['id_cpn'] }}</td>
                                    <td>{{ $getCoupon['coupon'] }}</td>
                                    <td>{{ $getCoupon['off'] }}</td>
                                    <td>{{ $getCoupon['exp_date'] }}</td>
                                    <td>
                                        <a href="{{ route('admin.editcoupon', $getCoupon['id_cpn']) }}" class="btn">Update</a>
                                        <form action="{{ route('coupon.delete', $getCoupon['id_cpn']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn">Delete</button>
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
