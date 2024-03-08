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
                    <form action="{{route('cars.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <!-- <div action="" method="POST" enctype="multipart/form-data"> -->
                                <div class=" personal">


                                    <div class="fields">

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Matricule</label>
                                            <input class="inst_crs_inpt" type="text" name="matricule_car" id="matricule_car" value="">
                                            @error('matricule_car')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Name</label>
                                            <input class="inst_crs_inpt" type="text" name="name_car" id="name" value="">
                                            @error('name_car')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="input-field">
                                            <label for="inst_crs_tag"  class="inst_crs_det_lbl">Car Description</label>
                                            <textarea class="inst_crs_inpt" name="desc_car" id="desc_car"> </textarea>
                                        </div> --}}

                                        <div class="input-field">
                                            <label>Category</label>
                                            <select class="inst_crs_lang" name="id_category">
                                                @foreach ($catCars as $catCar)
                                                <option value="{{ $catCar['id_category'] }}">{{ $catCar['name_category'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_category')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_tag"  class="inst_crs_det_lbl">Price By Day</label>
                                            <input type="number" class="inst_crs_inpt" name="price_car" id="price_car" value="">
                                            @error('price_car')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Color</label>
                                            <input class="inst_crs_inpt" type="text" name="color_car" id="color_car" value="">
                                        </div> --}}

                                        {{-- <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Model</label>
                                            <input class="inst_crs_inpt" type="text" name="model_car" id="model_car" value="">
                                        </div> --}}

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Type</label>
                                            <input class="inst_crs_inpt" type="text" name="type_car" id="type_car" value="">
                                            @error('type_car')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Model</label>
                                            <input class="inst_crs_inpt" type="text" name="model_car" id="model_car" value="">
                                            @error('model_car')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Car Insurance</label>
                                            <input class="inst_crs_inpt" type="date" name="car_insurance" id="car_insurance" value="">
                                            @error('car_insurance')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Exp Car Insurance</label>
                                            <input class="inst_crs_inpt" type="date" name="exp_car_insurance" id="exp_car_insurance" value="">
                                            @error('exp_car_insurance')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Technical Visit</label>
                                            <input class="inst_crs_inpt" type="date" name="technical_visit" id="technical_visit" value="">
                                            @error('technical_visit')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="input-field">
                                            <label for="inst_crs_name" class="inst_crs_det_lbl">Exp Technical Visit</label>
                                            <input class="inst_crs_inpt" type="date" name="exp_technical_visit" id="exp_technical_visit" value="">
                                            @error('exp_technical_visit')
                                            <div class="alert alert-danger mt-1 mb-1" style="color: red; font-size: 12px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div >
                                            <label>Car Image</label>
                                            <input type="file" name="img_car" id="img_car">
                                        </div>

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
