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
                        <h2> All Categories </h2>
                        <a href="{{ route('admin.addCategory') }}" class="btn">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Category Image</td>
                                <td>Category Id</td>
                                <td>Category Name</td>
                        </thead>

                        <tbody>
                            @foreach ($getCategories as $getCategory)
                                <tr>
                                    <td width="60px">
                                        <div class="imgBx"><img src="{{ asset('uploads/' . $getCategory->image_category) }}" alt="" width="80px" height="80px"></div>
                                    </td>
                                    <td>{{ $getCategory['id_category'] }}</td>
                                    <td>{{ $getCategory['name_category'] }}</td>
                                    <td>
                                        <a style="color: #292184; padding: 12px 16px;
                                        font-size: 16px; background-color: white" href="{{ route('admin.editcategory', $getCategory['id_category']) }}" class="btn">
                                        <i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('category.delete', $getCategory['id_category']) }}" method="POST">
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
