<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin Dashboard | BigCar </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.css')}}">

    <style>

        /* ===== Google Font Import - Poppins ===== */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    /* body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #4070f4;
    } */
    .container-ac{
        position: relative;
        /* max-width: 900px; */
        width: 100%;
        border-radius: 6px;
        padding: 30px;
        margin: 0 15px;
        background-color: #fff;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    .container-ac header{
        position: relative;
        font-size: 20px;
        font-weight: 600;
        color: #333;
    }
    .container-ac header::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        height: 3px;
        width: 27px;
        border-radius: 8px;
        background-color: #4070f4;
    }
    .container-ac form{
        position: relative;
        margin-top: 16px;
        min-height: 490px;
        background-color: #fff;
        overflow: hidden;
    }
    .container-ac form .form{
        position: absolute;
        background-color: #fff;
        transition: 0.3s ease;
    }
    .container-ac form .form.second{
        opacity: 0;
        pointer-events: none;
        transform: translateX(100%);
    }
    form.secActive .form.second{
        opacity: 1;
        pointer-events: auto;
        transform: translateX(0);
    }
    form.secActive .form.first{
        opacity: 0;
        pointer-events: none;
        transform: translateX(-100%);
    }
    .container-ac form .title{
        display: block;
        margin-bottom: 8px;
        font-size: 16px;
        font-weight: 500;
        margin: 6px 0;
        color: #333;
    }
    .container-ac form .fields{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    form .fields .input-field{
        display: flex;
        width:100%;
        flex-direction: column;
        margin: 4px 0;
    }
    .input-field label{
        font-size: 12px;
        font-weight: 500;
        color: #2e2e2e;
    }
    .input-field input, select{
        outline: none;
        font-size: 14px;
        font-weight: 400;
        color: #333;
        border-radius: 5px;
        border: 1px solid #aaa;
        padding: 0 15px;
        height: 42px;
        margin: 8px 0;
    }
    .input-field input :focus,
    .input-field select:focus{
        box-shadow: 0 3px 6px rgba(0,0,0,0.13);
    }
    .input-field select,
    .input-field input[type="date"]{
        color: #707070;
    }
    .input-field input[type="date"]:valid{
        color: #333;
    }
    .container-ac form button, .backBtn{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 45px;
        max-width: 200px;
        width: 100%;
        border: none;
        outline: none;
        color: #fff;
        border-radius: 5px;
        margin: 25px 0;
        background-color: #4070f4;
        transition: all 0.3s linear;
        cursor: pointer;
    }
    .container-ac form .btnText{
        font-size: 14px;
        font-weight: 400;
    }
    form button:hover{
        background-color: #265df2;
    }
    form button i,
    form .backBtn i{
        margin: 0 6px;
    }
    form .backBtn i{
        transform: rotate(180deg);
    }
    form .buttons{
        display: flex;
        align-items: center;
    }
    form .buttons button , .backBtn{
        margin-right: 14px;
    }

    @media (max-width: 750px) {
        .container form{
            overflow-y: scroll;
        }
        .container form::-webkit-scrollbar{
           display: none;
        }
        form .fields .input-field{
            width: calc(100% / 2 - 15px);
        }
    }

    @media (max-width: 550px) {
        form .fields .input-field{
            width: 100%;
        }
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
            <div class="details">
                <div class="recentOrders" style="width: 150%">
                    <form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <!-- <div action="" method="POST" enctype="multipart/form-data"> -->
                                <div class=" personal">
                                    <div class="fields">
                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">First Name</label>
                                            <input class="inst_crs_inpt" type="text" name="first_name" id="first_name" value="{{old('first_name')}}">
                                            @error('first_name')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Last Name</label>
                                            <input class="inst_crs_inpt" type="text" name="last_name" id="last_name" value="{{old('last_name')}}">
                                            @error('last_name')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Email Adress</label>
                                            <input class="inst_crs_inpt" type="email" name="email" id="email" value="{{old('email')}}">
                                            @error('email')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Password</label>
                                            <input class="inst_crs_inpt" type="password" name="password" id="password" value="{{old('password')}}">
                                            @error('password')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">User Age</label>
                                            <input class="inst_crs_inpt" type="number" name="age_user" id="age_user" value="">
                                            @error('user_name')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <div class="input-field">
                                            <label for="inst_crs_tag"  class="inst_crs_det_lbl">Phone Number</label>
                                            <input type="text" class="inst_crs_inpt" name="phone_number" id="phone_number" value="{{old('phone_number')}}">
                                            @error('phone_number')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="input-field">
                                            <label for="inst_crs_tag"  class="inst_crs_det_lbl">Role</label>
                                            <select name="user_role" id="user_role">
                                                <option value="0">--- Select Role ---</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                            @error('phone')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div> --}}

                                        <div class="input-field">
                                            <label for="inst_crs_tag"  class="inst_crs_det_lbl">C.I.N</label>
                                            <input type="text" class="inst_crs_inpt" name="cin" id="cin" value="{{old('cin')}}">
                                            @error('cin')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="input-field">
                                            <label for="inst_crs_tag"  class="inst_crs_det_lbl">User Password</label>
                                            <input type="password" class="inst_crs_inpt" name="password" id="password" value="">
                                            @error('password')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div >
                                            <label>User Image</label>
                                            <input type="file" name="profile_photo_path" id="profile_photo_path">
                                        </div> --}}
                                    <div class="buttons">
                                        <!-- <div class="backBtn">
                                            <i class="uil uil-navigator"></i>
                                            <span class="btnText">Back</span>
                                        </div> -->

                                        {{-- <button type="rest" class="inst_crs_rst_btn inst_crs_btns" id="inst_crs_rst_btn">Reset</button> --}}
                                            <!-- <span class="btnText">Submit</span>
                                            <i class="uil uil-navigator"></i> -->
                                                {{-- <input type="submit" value="Update" name="update" class="inst_crs_crt_btn inst_crs_btns" id="inst_crs_crt_btn"> --}}
                                                <button
                                                style="
                cursor: pointer;
                background-color: #292184;
                padding: 5px 10px;
                border-radius: 5px;
                color: white;
                text-decoration: none" type="rest" name="submit"  class="inst_crs_rst_btn inst_crs_btns" id="inst_crs_rst_btn">Create</button>
                                            </button>                                    </div>
                                </div>
                            </div>

                        </form>
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