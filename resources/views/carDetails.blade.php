<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <title>Book Now | JACARANDCAR</title>
  </head>
  <body>
    @include('master.navbar')

    <section>
      <div class="container">
        <div class="hero">
          <div class="details">
            @foreach ($cars as $car)
            <form action="#info-personnel">
              <h1>{{ $car['name_car'] }}</h1>
              <div></div>
              <p>{{ $car['price_car'] }}Dh / Jour</p>
              <button>Reserver</button>
            </form>
          </div>
          <div class="car-img">
            <img
              src="{{ asset('uploads/' . $car->img_car) }}"
              alt=""
            />
          </div>
          <div class="infos">
            {{-- <i class="fa-regular fa-car"> --}}
                <i class="fa fa-check-circle" aria-hidden="true">
                <span>Color: {{ $car['color_car'] }}</span>
            </i>
            <i class="fa fa-check-circle" aria-hidden="true">
                <span>Model: {{ $car['model_car'] }}</span>
            </i>
            <i class="fa fa-check-circle" aria-hidden="true">
                <span>Type: {{ $car['type_car'] }}</span>
            </i>
            <i class="fa fa-check-circle" aria-hidden="true">
                <span>Doors: 4</span>
            </i>
            <i class="fa fa-check-circle" aria-hidden="true">
                <span>Passengers: 5</span>
            </i>
            <!-- <i class="fa fa-whatsapp" aria-hidden="true">iMad</i>
            <i class="fa fa-whatsapp" aria-hidden="true">iMad</i> -->
          </div>
        </div>
      </div>
    </section>

    <form action="{{route('pay_by_cc', $car['id_car'])}}" method="POST">
    <section class="info-personnel" id="info-personnel">
      <div class="container">
        @csrf
        <div class="registration">
          <h1>Personnel Information</h1>
          <div class="form-inp">
            <div class="form-1">
              <label for="">First Name <span class="span_error">*</span> </label>
              @auth
              <input type="text" name="first_name" id="" value="{{auth()->user()->first_name}}" />
              @else
              <input type="text" name="first_name" id="" placeholder="Enter Your First Name"/>
              @endauth
              @error('first_name')
              <span style="color: red; font-size: 12px">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-1">
              <label for="">Last Name <span class="span_error">*</span> </label>
              @auth
              <input type="text" name="last_name" id="" value="{{auth()->user()->last_name}}" />
              @else
              <input type="text" name="last_name" id="" placeholder="Enter Your Last Name"/>
              @endauth
              @error('last_name')
              <span style="color: red; font-size: 12px">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="form-inp">
            <div class="form-1">
              <label for="">Email Adresse <span class="span_error">*</span> </label>
              @auth
              <input type="text" name="email" id="" placeholder="imad@exemple.com" value="{{auth()->user()->email}}" />
              @else
              <input type="text" name="email" id="" placeholder="imad@exemple.com" />
              @endauth
              @error('email')
                  <span style="color: red; font-size: 12px">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-1">
              <label for="">Phone Number <span class="span_error">*</span> </label>
              @auth
              <input type="text" name="phone_number" id="" placeholder="imad@exemple.com" value="{{auth()->user()->phone}}" />
              @else
              <input type="text" name="phone_number" id="" placeholder="imad@exemple.com" />
              @endauth
              @error('phone_number')
                  <span style="color: red; font-size: 12px">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="form-inp">
            <div class="form-1">
              <label for="">CIN <span class="span_error">*</span> </label>
              @auth
              <input type="text" name="cin_user" placeholder="Enter your CIN" value="{{auth()->user()->cin_user}}">
              @else
              <input type="text" name="cin_user" placeholder="Enter your CIN">
              @endauth
              @error('cin_user')
                  <span style="color: red; font-size: 12px">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-1">
              <label for="">Payement Method <span class="span_error">*</span> </label>
              <select name="py_md" id="py_md">
                <option value="0">---</option>
                <option id="cash" value="cash">Cash</option>
                <option id="c_card" value="c_card">PayPal</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="mp-cash hide hide-cash" id="cash-section">
      <div class="container" style="height: 450px">
        <input type="hidden" name="id_car" value="{{ $car['id_car'] }}">
        <input type="hidden" name="name_car" value="{{ $car['name_car'] }}">
        <input type="hidden" name="trans_number" value="{{ $transaction_number }}">
        <input type="hidden" id="inp_total_price" name="prix_total" value="">
        <input type="hidden" id="inp_first_date" name="first_date" value="">
        <input type="hidden" id="inp_last_date" name="last_date" value="">
        <input type="hidden" id="inp_pick_up_location" name="pu_location" value="">
        <input type="hidden" id="inp_return_location" name="r_location" value="">
        {{-- <p style="text-align: center; color: red; margin-top: 10px"><b> 24H And Your Order Will Be Deleted If You Don't Come To Pay </b></p> --}}
        <div class="mpc-infos">
          <p>Car Name :</p>
          {{-- <i class="fa fa-check-circle" aria-hidden="true"> --}}
          <p class="highlight">
            {{ $car['name_car'] }}
        </p>
        </div>
        <div class="mpc-infos">
          <p>Pick In :</p>
          <p class="highlight" id="pick_up_date"></p>
        </div>
        <div class="mpc-infos">
          <p>Pick Up :</p>
          <p class="highlight" id="return_date"></p>
        </div>
        <div class="mpc-infos">
          <p>Pick Up Location :</p>
          <p class="highlight" id="pick_up_location"></p>
        </div>
        <div class="mpc-infos">
          <p>Return Location:</p>
          <p class="highlight" id="return_location"></p>
        </div>
        <div class="mpc-infos">
          <p>Total Price :</p>
          <p class="highlight" id="total_price"></p>
        </div>
        <div class="mpc-infos">
          <p>Date Command :</p>
          <p id="cmd_date" class="highlight">
            @php
                echo date("Y/m/d");
            @endphp
            </span>
          </p>
        </div>
        <button type="submit" id="btn_pay_cc"></button>
      </div>
    </section>
</form>

    <section class="mp-cash hide hide-cash" id="paypal-section">
      <div class="container" style="height: 600px">





        <div class="container d-flex justify-content-center align-items-center">
            <div class="row" style="padding: 18px; display: none;" id="paypalbtn">
              <div>
                  <input type="hidden" name="cmd" value="_xclick">
                  <input type="hidden" name="business" value="sb-sridf23348878_api1.business.example.com">
                  <input type="hidden" name="currency_code" value="USD">
                  {{-- <input type="hidden" name="amount" value="{{ $dPayableAmount }}"> --}}
                  <input type="hidden" name="first_name" id="first_name" value="">
                  <input type="hidden" name="last_name" id="last_name" value="">
                  <input type="hidden" name="address1" value="">
                  <input type="hidden" name="address2" value="">
                  {{-- <input type="hidden" name="email" value="{{ Crypt::decryptString(Session::get('ue')) }}"> --}}
                  <input type="hidden" name="country" value="Saudi Arabia">

                  <input type="hidden" name="return" value="{{ route('payment.success') }}">
                  <input type="hidden" name="cancel_return" value="{{ route('payment.cancel') }}">

                  <input type="image"
                    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_paynow_107x26.png" alt="Pay Now" style="cursor: pointer;">

                  <img alt="" src="https://paypalobjects.com/en_US/i/src/pixel.gif" width="1" height="1" style="cursor: pointer;">
             </div>
            </div>
          </div>











        <img src="data:image/jpeg;base64,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"
            alt="" style="margin: auto" />
        <div class="mpc-infos">
          <p>Car Name :</p>
          <p class="highlight" id="car_name_pp">{{ $car['name_car'] }}</p>
        </div>
        <div class="mpc-infos">
          <p>Pick In :</p>
          <p class="highlight" id="pick_in_pp">27-11-2022</p>
        </div>
        <div class="mpc-infos">
          <p>Pick Up :</p>
          <p class="highlight" id="pick_out_pp">30-11-2022</p>
        </div>
        <div class="mpc-infos">
          <p>Pick Up Location :</p>
          <p class="highlight" id="pick_up_location_pp"></p>
        </div>
        <div class="mpc-infos">
          <p>Return Location:</p>
          <p class="highlight" id="return_location_pp"></p>
        </div>
        <div class="mpc-infos">
          <p>Total Price :</p>
          <p class="highlight" id="total_price_pp">390Dh</p>
        </div>
        <div class="mpc-infos">
          <p>Date Command :</p>
          <p class="highlight" id="date_command_pp">
            @php
                echo date("Y/m/d");
            @endphp
          </p>
        </div>
        <a href="{{route('payment')}}" id="btn_pay"></a>
      </div>
      @endforeach
    </section>

    @include('master.footer')

    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
        var firstDat = sessionStorage.getItem('firstDat');
        var lastDat = sessionStorage.getItem('lastDat');
        var pick_up_location = sessionStorage.getItem('pick_up_location');
        var return_location = sessionStorage.getItem('return_location');

        let firstDate = document.getElementById('return_date').innerHTML = lastDat;
        let lastDate = document.getElementById('pick_up_date').innerHTML = firstDat;
        let pickUpLocation = document.getElementById('pick_up_location').innerHTML = pick_up_location;
        let returnLocation = document.getElementById('return_location').innerHTML = return_location;

        let firstDatePp = document.getElementById('pick_in_pp').innerHTML = lastDat;
        let lastDatePp = document.getElementById('pick_out_pp').innerHTML = firstDat;
        let pickUpLocationPp = document.getElementById('pick_up_location_pp').innerHTML = pick_up_location;
        let returnLocationPp = document.getElementById('return_location_pp').innerHTML = return_location;

        let time_difference = Math.abs(new Date(lastDat) - new Date(firstDat));
        let result = Math.ceil(time_difference / (1000 * 60 * 60 * 24));
        var conceptName = '{{ $car['price_car'] }}';
        let total_price = result * conceptName;
        let total_1 = document.getElementById('total_price').innerHTML = `${total_price} Dh`;
        let total_price_pp = document.getElementById('total_price_pp').innerHTML = `${total_price} Dh`;

        let inp_total = document.getElementById('inp_total_price').value = total_price;
        let first_date = document.getElementById('inp_first_date').value = firstDat;
        let last_date = document.getElementById('inp_last_date').value = lastDat;
        let inp_pick_up_location = document.getElementById('inp_pick_up_location').value = pickUpLocation;
        let inp_return_location = document.getElementById('inp_return_location').value = returnLocation;

        let btn_pay_cc = document.getElementById('btn_pay_cc').innerHTML = `Continue Booking With ${total_price} Dh`;
        let btn_pay = document.getElementById('btn_pay').innerHTML = `Continue Booking With ${total_price} Dh`;
        console.log(firstDat);
    </script>
  </body>
</html>
