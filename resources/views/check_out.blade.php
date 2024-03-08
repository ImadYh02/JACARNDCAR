<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap');

    * {
        margin:
            0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        font-family: 'Montserrat',
            sans-serif
    }

    body {
        padding: 5px
    }

    p {
        margin: 0%
    }

    .container {
        max-width: 900px;
        margin:
            20px auto;
        overflow: hidden
    }

    .box-1 {
        max-width: 450px;
        padding: 10px 40px;
        user-select: none
    }

    .box-1 img.pic {
        width: 20px;
        height: 20px;
        object-fit:
            cover
    }

    .box-1 img.mobile-pic {
        width: 100%;
        height: 200px;
        object-fit: cover
    }

    .box-1 .name {
        font-size: 11px;
        font-weight: 600
    }

    .dis {
        font-size: 12px;
        font-weight:
            500
    }

    .box-2 {
        max-width: 450px;
        padding: 10px 40px
    }

    .box-2 .box-inner-2 input.form-control {
        font-size: 12px;
        font-weight: 600
    }

    .box-2 .box-inner-2 .inputWithIcon {
        position: relative
    }

    .box-2 .box-inner-2 .inputWithIcon span {
        position: absolute;
        left: 15px;
        top: 8px
    }

    .box-2 .box-inner-2 .inputWithcheck {
        position: relative
    }

    .box-2 .box-inner-2 .inputWithcheck span {
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius:
            50%;
        background-color: green;
        font-size: 12px;
        color: white;
        display:
            flex;
        justify-content: center;
        align-items: center;
        right: 15px;
        top:
            6px
    }

    .form-control:focus,
    .form-select:focus {
        box-shadow: none;
        outline:
            none;
        border: 1px solid #7700ff
    }

    .border:focus-within {
        border: 1px solid #7700ff !important
    }

    .box-2 .card-atm .form-control {
        border: none;
        box-shadow:
            none
    }

    .form-select {
        border-radius: 0;
        border-top-left-radius:
            10px;
        border-top-right-radius: 10px
    }

    .address .form-control.zip {
        border-radius:
            0;
        border-bottom-left-radius: 10px
    }

    .address .form-control.state {
        border-radius:
            0;
        border-bottom-right-radius: 10px
    }

    .box-2 .box-inner-2 .btn.btn-outline-primary {
        width: 120px;
        padding: 10px;
        font-size: 11px;
        padding: 0% !important;
        display: flex;
        align-items: center;
        border: none;
        border-radius:
            0;
        background-color: whitesmoke;
        color: black;
        font-weight: 600
    }

    .box-2 .box-inner-2 .btn.btn-primary {
        background-color: #7700ff;
        color: whitesmoke;
        font-size:
            14px;
        display: flex;
        align-items: center;
        font-weight: 600;
        justify-content:
            center;
        border: none;
        padding: 10px
    }

    .box-2 .box-inner-2 .btn.btn-primary:hover {
        background-color: #7a34ca
    }

    .box-2 .box-inner-2 .btn.btn-primary .fas {
        font-size: 13px !important;
        color:
            whitesmoke
    }

    .carousel-indicators [data-bs-target] {
        width: 10px;
        height:
            10px;
        border-radius: 50%
    }

    .carousel-inner {
        width: 100%;
        height: 200px
    }

    .carousel-item img {
        object-fit: cover;
        height: 100%
    }

    .carousel-control-prev {
        transform:
            translateX(-50%);
        opacity: 1
    }

    .carousel-control-prev:hover .fas.fa-arrow-left {
        transform: translateX(-5px)
    }

    .carousel-control-next {
        transform:
            translateX(50%);
        opacity: 1
    }

    .carousel-control-next:hover .fas.fa-arrow-right {
        transform: translateX(5px)
    }

    .fas.fa-arrow-left,
    .fas.fa-arrow-right {
        font-size: 0.8rem;
        transition: all .2s ease
    }

    .icon {
        width:
            30px;
        height: 30px;
        background-color: #f8f9fa;
        color: black;
        display:
            flex;
        align-items: center;
        justify-content: center;
        border-radius:
            50%;
        transform-origin: center;
        opacity: 1
    }

    .fas.fa-times {
        color: red
    }

    .fas,
    .fab {
        color: #6d6c6d
    }

    ::placeholder {
        font-size: 12px
    }

    .couponCode {
        text-transform:
            uppercase;
        font-size: 0.7rem
    }

    #code {
        pointer-events: none;
        font-weight:
            600
    }

    .close {
        cursor: pointer
    }

    .info {
        transform: translateX(-500px);
        animation: moving 1.5s;
        animation-fill-mode: forwards
    }

    .updates {
        transform:
            translateX(-500px);
        animation: moving 1.7s;
        animation-fill-mode:
            forwards
    }

    .different {
        transform: translateX(-500px);
        animation: moving 1.9s;
        animation-fill-mode: forwards
    }

    .black {
        transform:
            translateX(-500px);
        animation: moving 2.1s;
        animation-fill-mode:
            forwards
    }

    .white {
        transform: translateX(-500px);
        animation: moving 2.3s;
        animation-fill-mode: forwards
    }

    .pastel {
        transform:
            translateX(-500px);
        animation: moving 2.5s;
        animation-fill-mode:
            forwards
    }

    .footer {
        transform: translateX(-500px);
        animation: moving 2.6s;
        animation-fill-mode: forwards
    }

    .hide {
        display: none;
    }

    @keyframes moving {
        0% {
            opacity: 0;
            transform:
                translateX(-500px)
        }

        100% {
            opacity: 1;
            transform: translateX(0px)
        }
    }

    .box-2 {
        transform:
            translateY(-500px);
        animation: img-top 2.5s;
        animation-fill-mode:
            forwards
    }

    .user {
        transform: translateY(-500px);
        animation: img-top 2.5s;
        animation-fill-mode: forwards
    }

    .userdetails {
        transform:
            translateY(-500px);
        animation: img-top 2.0s;
        animation-fill-mode:
            forwards
    }

    .imgdetails {
        transform: translateY(-500px);
        animation: img-top 1.5s;
        animation-fill-mode: forwards
    }

    @keyframes img-top {
        0% {
            opacity: 0;
            transform:
                translateY(-500px)
        }

        100% {
            opacity: 1;
            transform: translateY(0px)
        }
    }

    @media (max-width:768px) {
        .container {
            max-width: 700px;
            margin: 10px auto
        }

        .box-1,
        .box-2 {
            max-width: 600px;
            padding: 20px 90px;
            margin: 20px auto
        }

        .box-2 {
            transform:
                translateX(-500px);
            animation: box-side 2.6s;
            animation-fill-mode:
                forwards
        }

        @keyframes box-side {
            0% {
                opacity: 0;
                transform:
                    translateX(-500px)
            }

            100% {
                opacity: 1;
                transform: translateX(0px)
            }
        }
    }

    @media (max-width:426px) {

        .box-1,
        .box-2 {
            max-width: 400px;
            padding: 20px 10px
        }

        ::placeholder {
            font-size: 9px
        }
    }
</style>

<div class="container d-lg-flex">
    <div class="box-1 bg-light user">
        <div class="d-flex align-items-center mb-3">
            <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                class="pic rounded-circle" alt="" />
            <p class="ps-2 name">Oliur</p>
        </div>
        @foreach ($cars as $car)
        <div class="box-inner-1 pb-3 mb-3">
            <div class="d-flex justify-content-between mb-3 userdetails">
                <p class="fw-bold">{{$car['name_car'] }}</p>
                <p class="fw-lighter">
                    <span class="fas fa-dollar-sign"></span>{{ $car['price_car'] }}
                </p>
            </div>
            <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel"
                data-bs-interval="2000">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#my" data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#my" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#my" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('uploads/' .$car['img_car']) }}"
                            class="d-block w-100" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#my" data-bs-slide="prev">
                    <div class="icon">
                        <span class="fas fa-arrow-left"></span>
                    </div>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#my" data-bs-slide="next">
                    <div class="icon">
                        <span class="fas fa-arrow-right"></span>
                    </div>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <p class="dis my-3 info">
                {{ $car['desc_car'] }}
            </p>
            <p class="dis mb-3 updates">Free updates forever</p>
            <p class="dis mb-3 different">Three different colored sets:</p>
            <div class="dis">
                <p class="black">
                <b>Pick up date: </b>
                    <span id="pick_up_date" class="fas fa-arrow-right mb-3 pe-2"></span>
                </p>
                <p class="white">
                    <b>Return date: </b>
                    <span id="return_date" class="fas fa-arrow-right mb-3 pe-2"></span>
                </p>
                <p class="white">
                    <b>Price by day: </b>
                    <span id="price_by_day" class="fas fa-arrow-right mb-3 pe-2">
                        {{ $car['price_car'] }}
                    </span>
                </p>
                <p class="white">
                    <b>Total price: </b>
                    <span id="total_price" class="fas fa-arrow-right mb-3 pe-2"></span>
                </p>
                <p class="white">
                    <b>Command date: </b>
                    <span id="total_price" class="fas fa-arrow-right mb-3 pe-2"></span>
                </p>
            </div>
            <div>
                <p class="dis footer my-3">
                    Here is a quick guide on how to apply them
                </p>
            </div>
        </div>
    </div>
    <div class="box-2">
        <div class="box-inner-2">
            <div>
                <p class="fw-bold">Payment Details</p>
                <p class="dis mb-3">
                    Complete your purchase by providing your payment details
                </p>
            </div>
            <form action="{{ route('pay_by_cc') }}" method="POST">
                                <div class="mb-3">
                    <p class="dis fw-bold mb-2">First Name*</p>
                    <input class="form-control" type="text" />
                </div>
                <div class="mb-3">
                    <p class="dis fw-bold mb-2">Lats Name*</p>
                    <input class="form-control" type="text" />
                </div>
                <div class="mb-3">
                    <p class="dis fw-bold mb-2">Email address*</p>
                    <input class="form-control" type="email" placeholder="luke@skywalker.com" />
                </div>
                <div class="mb-3">
                    <p class="dis fw-bold mb-2">Phone Number*</p>
                    <input class="form-control" type="email"/>
                </div>

                <div class="mb-3">
                    <p class="dis fw-bold mb-2">CIN*</p>
                    <input class="form-control" type="text"/>
                </div>

                <div class="mb-3">
                    <p class="dis fw-bold mb-2">Payement Method*</p>
                    <select class="form-select" aria-label="Default select example" name="py_md" id="py_md">
                        <option value="0">--- </option>
                        <option id="cash" value="cash">Cash</option>
                        <option id="c_card" value="c_card">Credit Card (PayPal)</option>
                    </select>
                </div>
                <div class="hide cash" id="cash_div">
                    <div class="address">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR8OMNR_sQEVPqLFuOMZa-JqYwMzXBYHrcRpkqkC_dp71vzVmrbvrvIercPLCG5LxBgJTs&usqp=CAU" alt="" srcset="">
                        <div class="d-flex flex-column dis">
                            {{-- <form action="{{route('payment')}}" method="POST"> --}}
                                {{-- @csrf --}}
                                <a href="{{route('payment')}}" class="btn btn-primary mt-2" id="btn_pay" style="width: 100%"></a>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_car" value="{{ $car['id_car'] }}">
                <input type="hidden" id="inp_total_price" name="prix_total" value="">
                <input type="hidden" id="inp_first_date" name="first_date" value="">
                <input type="hidden" id="inp_last_date" name="last_date" value="">
                <div class="hide" id="c_card_div">
                    24H, Then your order is deleted if your not come to pay !
                        @csrf
                        <button type="submit" class="btn btn-primary mt-2" onclick="submit_opp()" id="btn_pay_cc" style="width: 100%"></button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>


<script>
    window.addEventListener("load", () => { // when the page loads
        document.getElementById("py_md").addEventListener("change", function() {
            if (this.value == 'cash') {
                document.getElementById("cash_div").classList.add("hide");
                document.getElementById("c_card_div").classList.remove("hide");
            }
            else if (this.value == 'c_card') {
                document.getElementById("c_card_div").classList.add("hide");
                document.getElementById("cash_div").classList.remove("hide");
            }
        })
    })


    // let firstDate = document.getElementById('first_day');
    var firstDat = sessionStorage.getItem('firstDat');
    var lastDat = sessionStorage.getItem('lastDat');

    let firstDate = document.getElementById('return_date').innerHTML = lastDat;
    let lastDate = document.getElementById('pick_up_date').innerHTML = firstDat;

    let time_difference = Math.abs(new Date(lastDat) - new Date(firstDat));
    let result = Math.ceil(time_difference / (1000 * 60 * 60 * 24));
    var conceptName = '{{ $car['price_car'] }}';
    let total_price = result * conceptName;
    let total = document.getElementById('total_price').innerHTML = total_price;
    let inp_total = document.getElementById('inp_total_price').value = total_price;
    console.log(total_price);

    let btn_pay = document.getElementById('btn_pay').innerHTML = `Pay ${total_price} Dh`
    let btn_pay_cc = document.getElementById('btn_pay_cc').innerHTML = `Pay ${total_price} Dh`

    let first_date = document.getElementById('inp_first_date').value = firstDat;
    let last_date = document.getElementById('inp_last_date').value = lastDat;

    // sessionStorage.setItem('lastDat', id_car);
</script>
