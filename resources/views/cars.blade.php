<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/plugins/global/plugins.bundle.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
    <title>Cars | JACARANDCAR</title>
  </head>

  <body>
    @include('master.navbar')

    <div class="container">
      <div class="panel">
        <h1>Our Cars</h1>
      </div>
    </div>

    {{-- <div class="container">
      <section class="filters">
        <div class="btn-all">
          <button>Show All ({{$totalCars}})</button>
        </div>
        <div class="drops">
          <div class="first-drop">
            <select name="" class="select" id="">
              <option value="">hgjhk</option>
              <option value="">hgjhk</option>
              <option value="">hgjhk</option>
            </select>
          </div>

          <div class="second-drop">
            <select name="" class="select" id="">
              <option value="">hgjhk</option>
              <option value="">hgjhk</option>
              <option value="">hgjhk</option>
            </select>
          </div>

          <div class="third-drop">
            <select name="" class="select" id="">
              <option value="">hgjhk</option>
              <option value="">hgjhk</option>
              <option value="">hgjhk</option>
            </select>
          </div>
        </div>
      </section>
    </div> --}}

    <div class="container">
        <section class="cards">
          @foreach ($cars as $car)
            <div class="card-car">
                <div class="img-car">
                    <img src="{{ asset('uploads/' . $car->img_car) }}" alt="">
                </div>

                <div class="info-car">
                    <div class="line-0">
                      <p>{{ $car->name_car }}</p>
                      <span>{{ $car->model_car }}</span>
                    </div>

                    <div class="info-sh">
                      <div class="first-row">
                        <div class="line-1">
                          <i class="fa-solid fa-user-group"></i>
                          <p>5 People</p>
                        </div>

                        <div class="line-1">
                          <i class="fa fa-cogs" aria-hidden="true"></i>
                          <p>Automatic</p>
                        </div>
                      </div>

                      <div class="second-row">
                        <div class="line-1">
                          <i class="fa-solid fa-gas-pump"></i>
                          <p>{{ $car->type_car }}</p>
                        </div>

                        <div class="line-1">
                          <i class="fa-solid fa-location-dot"></i>
                          <p>GPS Navi.</p>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="btn-car">
                  <p>
                    <span class="prices">
                        {{ $car->price_car }}
                    </span>
                    Dh <sub>/ day</sub></p>
                  <a value="{{$car->id_car}}" onclick="myFunction()" class="demo" id="demo">Rent Car</a>
                  <main style="position: fixed; z-index: 999; top: 0; left: 0; width: 1000px; height: 100%; overflow: auto;" class="hide" id="main">
                    <form id="form" action="{{ route('car_details', $car->id_car) }}">
                        @csrf
                        <div class="booking-form">
                        <span onclick="closeModel()" class="close">&times;</span>
                        <div class="top-form">
                            <div class="left-form">
                            <p style="color: white">Pick-Up Information</p>
                            <select name="pick_up_location" id="pick_up_location">
                                <option selected disabled value="0">Pick Up City And Location :</option>
                                @foreach ($locations as $location)
                                <option value={{$location->name_location}}>{{$location->name_location}}</option>
                                @endforeach
                                {{-- <option value="marrakech">Marrakesh</option>
                                <option value="casa">Casa</option> --}}
                            </select>
                            <input type="date" class="txtDate" name="first_day" id="first_day">
                            </div>
                            <div class="right-form">
                            <p style="color: white">Return Information</p>
                            <select name="return_location" id="return_location" class="select">
                            <option selected disabled value="0">Return City And Location :</option>
                            @foreach ($locations as $location)
                                <option value={{$location->name_location}}>{{$location->name_location}}</option>
                            @endforeach
                            </select>
                            <input type="date" class="txtDate" name="last_day" id="last_day">
                            </div>
                        </div>
                        <div class="btn-form">
                            <button onclick="storeDates()" style="cursor: pointer" type="submit" id="btn_booking" class="btn-login">{{__('all.Check Availability')}}</button>
                            {{-- <a href="{{route('car_details', $car->id_car)}}">Rent Car</a> --}}
                        </div>
                        </div>
                    </form>
                </main>
                  {{-- <a href="{{route('car_details', $car->id_car)}}">Rent Car</a> --}}
                  {{-- <button type="submit" onclick="showPopUp()">JKM%</button> --}}
                </div>
            </div>
          @endforeach
      </section>
    </div>

    @include('master.footer')

    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{asset('assets/js/script.js')}}"></script>

    {{-- <script>
        $(document).on('click', '#demo', function() {
            var car_id = $(this).val();
            $('#main').removeClass('show');
        });
    </script> --}}

    <script>
        let mainjj = document.getElementById("main");
        // document.querySelector(".demo").addEventListener("click", myFunction);

        function myFunction() {
            mainjj.classList.remove('hide');
            // alert('hii')
        }
        // When the user clicks on <span> (x), close the modal
        function closeModel() {
            // mainjj.style.display = "none";
            mainjj.classList.add('hide');
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            mainjj.style.display = "none";
        }
        }
    </script>

    <script>
        $(function() {
          var dtToday = new Date();
          var month = dtToday.getMonth() + 1;
          var day = dtToday.getDate();
          var year = dtToday.getFullYear();
          if(month < 10)
            month = '0' + month.toString();
          if(day < 10)
            day = '0' + day.toString();

          var maxDate = year + '-' + month + '-' + day;

          $('.txtDate').attr('min', maxDate);
        });

        function storeDates() {
              let firstDate = document.getElementById('first_day');
              let lastDate = document.getElementById('last_day');
              let pick_up_location = document.getElementById('pick_up_location');
              let return_location = document.getElementById('return_location');

              sessionStorage.setItem('firstDat', firstDate.value);
              sessionStorage.setItem('lastDat', lastDate.value);
              sessionStorage.setItem('pick_up_location', pick_up_location.value);
              sessionStorage.setItem('return_location', return_location.value);
        }
    </script>

    <script>
      $(function () {
        $(".select").select2();
      });
    </script>
  </body>
</html>
