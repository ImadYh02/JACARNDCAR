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
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="recentOrders" style="width: 150%">
                    <div class="cardHeader">
                        <h2> All Cars </h2>
                        <a href="{{ route('admin.addCar') }}" class="btn">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Car Picture</td>
                                <td>Car Matricule</td>
                                <td>Date Insurance</td>
                                <td>Date Expiration</td>
                                <td>Technical Visit</td>
                                <td>Expiration Technical Visit</td>
                                {{-- <td>Action</td> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($getCars as $getCar)
                            @if ($getCar['exp_car_insurance'] <= now()->format('Y-m-d') || $getCar['exp_technical_visit'] <= now()->format('Y-m-d'))
                                <tr style="background-color: #ff0e0e">
                                    <td>{{ $getCar['id_car'] }}</td>
                                    <td width="60px">
                                        <div class="imgBx"><img src="{{ asset('uploads/' . $getCar->img_car) }}" alt="" width="80px" height="80px"></div>
                                    </td>
                                    <td>{{ $getCar['matricule_car'] }}</td>
                                    <td>{{ $getCar['car_insurance'] }}</td>
                                    <td>{{ $getCar['exp_car_insurance'] }}</td>
                                    <td>{{ $getCar['technical_visit'] }}</td>
                                    <td>{{ $getCar['exp_technical_visit'] }}</td>
                                    {{-- <td>
                                        <a href="{{ route('admin.editcar', $getCar['id_car']) }}" style="color: #292184; padding: 12px 16px;
                                        font-size: 16px; background-color: white" class="btn">Update</a>
                                        <form action="{{ route('car.delete', $getCar['id_car']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="
                                            background-color: white;
                                            border: none;
                                            color: #292184;
                                            padding: 12px 16px;
                                            font-size: 16px;
                                            cursor: pointer;
                                            ">Delete</button>
                                        </form>
                                    </td> --}}
                                    {{-- <td><span class="status delivered">Delivered</span></td> --}}
                                </tr>
                            @else
                            <tr style="color: black">
                                <td>{{ $getCar['id_car'] }}</td>
                                <td width="60px">
                                    <div class="imgBx"><img src="{{ asset('uploads/' . $getCar->img_car) }}" alt="" width="80px" height="80px"></div>
                                </td>
                                <td>{{ $getCar['matricule_car'] }}</td>
                                <td>{{ $getCar['car_insurance'] }}</td>
                                <td>{{ $getCar['exp_car_insurance'] }}</td>
                                <td>{{ $getCar['technical_visit'] }}</td>
                                <td>{{ $getCar['exp_technical_visit'] }}</td>
                                {{-- <td>
                                    <a href="{{ route('admin.editcar', $getCar['id_car']) }}" class="btn">Update</a>
                                    <form action="{{ route('car.delete', $getCar['id_car']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">Delete</button>
                                    </form>
                                </td> --}}
                                {{-- <td><span class="status delivered">Delivered</span></td> --}}
                            </tr>
                            @endif
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>
