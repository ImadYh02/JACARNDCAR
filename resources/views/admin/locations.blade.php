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
                        <h2> All Locations </h2>
                        <a href="{{ route('admin.addLocation') }}" class="btn">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Location Id</td>
                                <td>Location Name</td>
                                <td>Status</td>
                        </thead>

                        <tbody>
                            @foreach ($getLocations as $getLocation)
                                <tr>
                                    <td>{{ $getLocation['id_location'] }}</td>
                                    <td>{{ $getLocation['name_location'] }}</td>
                                    <td>
                                        <div class="status" style="display: flex; justify-content: flex-end">
                                            <a style="color: #292184; padding: 12px 16px;
                                        font-size: 16px; background-color: white" href="{{ route('admin.editlocation', $getLocation['id_location']) }}" class="btn">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('location.delete', $getLocation['id_location']) }}" method="POST">
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
                                        </div>
                                    </td>
                                    {{-- <td> <img src="{{ $getCategory['image_category'] }}" alt=""></td> --}}
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
