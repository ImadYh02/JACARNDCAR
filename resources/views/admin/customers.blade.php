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
    <style>
        .hide {
            display: none;
        }

        img {
  height: 250px;
  border-radius: 50%;
}

h1 {
  font-weight: bold;
  margin-top: 6px;
}

a {
    color: #292184;
    text-decoration: none
}

.container_to {
  margin: auto;
  width: 70%;
  /* height: 50%; */
  background-color:white;
  position: absolute;
  top: 50%; left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999;
}

.container_to .hero_to {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px;
}

.container_to .hero_to .admin_to, .user_to {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  cursor: pointer;
}
    </style>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        @include('master.admin_nav')

        <!-- ========================= Main ==================== -->
        <div class="main">
            @include('master.admin_main')
            <!-- ================ Order Details List ================= -->


            <div class="container_to hide" id="toggle" style="position: absolute">
                <p style="position: absolute; right:5px; cursor: pointer;" onclick="hide_page()">x</p>
                <div class="hero_to">
                    <div class="admin_to">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="">
                        <a href="{{ route('admin.addAdmin') }}"><h1>Admin</h1></a>
                    </div>
                    <div class="user_to">
                        <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="">
                        <a href="{{ route('admin.addUser') }}"><h1>User</h1></a>
                    </div>
                </div>
            </div>

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

                <div class="recentOrders" style="width: 150%"  id="body">
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
                        <h2> All Customers </h2>
                        {{-- <a href="{{ route('admin.addUser') }}" id="add_new" class="btn">Add New</a> --}}
                        <a onclick="show_toggle()" id="add_new" class="btn" style="cursor: pointer">Add New</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>First Name</td>
                                <td>Last Name</td>
                                <td>Email Adress</td>
                                <td>Phone Number</td>
                                <td>C.I.N</td>
                                {{-- <td>User Age</td> --}}
                                {{-- <td>Phone</td>
                                <td>Email</td> --}}
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($getUsers as $getUser)
                                <tr>
                                    <td>{{ $getUser['id_duser'] }}</td>
                                    {{-- <td width="60px">
                                        <div class="imgBx"><img src="{{ asset('uploads/' . $getUser->profile_photo_path) }}" alt="" width="80px" height="80px"></div>
                                    </td>
                                    <td>
                                        @if ( $getUser['liste_noir'] == 1 )
                                        <input name="list_noir" type="checkbox" checked/>
                                        @else
                                        <input name="list_noir" type="checkbox"/>
                                        @endif
                                    </td> --}}
                                    <td>{{ $getUser['first_name'] }}</td>
                                    <td>{{ $getUser['last_name'] }}</td>
                                    <td>{{ $getUser['email'] }}</td>
                                    <td>{{ $getUser['phone_number'] }}</td>
                                    <td>{{ $getUser['cin'] }}</td>
                                    {{-- <td>{{ $getUser['permis_user'] }}</td> --}}
                                    {{-- <td>{{ $getUser['age_user'] }}</td> --}}
                                    <td>
                                        {{-- <a href="{{ route('admin.editUser', $getUser['id']) }}" class="btn" style="color: #292184; padding: 12px 16px;
                                        font-size: 16px; background-color: white"><i class="fa fa-refresh" aria-hidden="true"></i></a> --}}
                                        <form action="{{ route('user.delete', $getUser['id_duser']) }}" method="POST">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script>
        let toggle = document.getElementById('toggle');

        function show_toggle() {
            toggle.classList.remove('hide');
        }

        function hide_page() {
            toggle.classList.add('hide');
        }
    </script>
    <script src={{asset('admin_assets/js/main.js')}}></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
