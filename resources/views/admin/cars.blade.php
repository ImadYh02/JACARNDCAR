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
                {{-- @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                    <p>{{ $message }}</p>
                    </div>
                @endif --}}

                <div class="recentOrders" style="width: 150%">
                    @if ($message = Session::get('success'))
                    <div class="container">
                        <div class="message">
                            <div class="alert">
                                {{ $message }}
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="cardHeader">
                        <h2> All Cars </h2>
                        <a href="{{ route('admin.addCar') }}" class="btn">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Car Picture</td>
                                <td>Car Name</td>
                                {{-- <td>Description</td> --}}
                                {{-- <td>Availbitily</td> --}}
                                <td>Price</td>
                                {{-- <td>Colors</td>
                                <td>Model</td> --}}
                                <td>Type</td>
                                <td>Category</td>
                                <td>Disponsibility</td>
                                {{-- <td>Status</td> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($getCars as $getCar)
                            {{-- @foreach ($despoCars as $despoCar) --}}
                                <tr>
                                    <td>{{ $getCar['id_car'] }}</td>
                                    <td width="60px">
                                        <div class="imgBx"><img src="{{ asset('uploads/' . $getCar->img_car) }}" alt="" width="80px" height="80px"></div>
                                    </td>
                                    <td>{{ $getCar['name_car'] }}</td>
                                    {{-- <td>{{ $getCar['desc_car'] }}</td> --}}
                                    {{-- <td>
                                        @if ($getCar['is_available'] ==1)
                                        <span class="status delivered">Done</span>
                                        @else
                                        <span class="status delivered" style="background-color: rgb(211, 35, 35)">Reserve</span>
                                        @endif

                                    </td> --}}
                                    <td>{{ $getCar['price_car'] }}</td>
                                    {{-- <td>{{ $getCar['color_car'] }}</td>
                                    <td>{{ $getCar['model_car'] }}</td> --}}
                                    <td>{{ $getCar['type_car'] }}</td>
                                    <td>{{ $getCar['name_category'] }}</td>
                                    {{-- <td>
                                        @foreach ($despoCars as $despoCar)
                                            @if ($getCar->id_car == $despoCar->id_car)
                                                A
                                            @endif
                                            @break
                                            @endforeach
                                            B
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('admin.editcar', $getCar['id_car']) }}" class="btn" style="color: #292184; padding: 12px 16px;
                                        font-size: 16px; background-color: white"><i class="fa-solid fa-pen-to-square"></i></a>
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
                                            "><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    {{-- <td><span class="status delivered">Delivered</span></td> --}}
                                </tr>
                            {{-- @endforeach --}}
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
