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
    <title>Cars| JACARANDCAR</title>
  </head>

  <body>
    @include('master.navbar')

    <div class="container">
      <div class="panel">
        <h1>Booking With The best price</h1>
      </div>
    </div>

    {{-- <div class="container">
      <section class="filters">
        <div class="btn-all">
          <button>Show All</button>
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
                  <p>{{ $car->price_car }}Dh <sub>/ day</sub></p>
                  <a href="{{route('car_details', $car->id_car)}}">Rent Car</a>
                </div>
            </div>
          @endforeach

            <!-- <div class="card-car">
              <div class="img-car">
                  <img src="./assets/pic/bg-3.jpg" alt="">
              </div>

              <div class="info-car">
                <div class="line-0">
                  <p>Dacia</p>
                  <span>2019</span>
                </div>

                <div class="info-sh">
                  <div class="first-row">
                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>

                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>
                  </div>

                  <div class="second-row">
                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>

                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-car">
                <p>250Dh <sub>/ day</sub></p>
                <a href="#">Rent Car</a>
              </div>
            </div>

            <div class="card-car">
              <div class="img-car">
                  <img src="./assets/pic/bg-3.jpg" alt="">
              </div>

              <div class="info-car">
                <div class="line-0">
                  <p>Dacia</p>
                  <span>2019</span>
                </div>

                <div class="info-sh">
                  <div class="first-row">
                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>

                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>
                  </div>

                  <div class="second-row">
                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>

                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-car">
                <p>250Dh <sub>/ day</sub></p>
                <a href="#">Rent Car</a>
              </div>
            </div>

            <div class="card-car">
              <div class="img-car">
                  <img src="./assets/pic/bg-3.jpg" alt="">
              </div>

              <div class="info-car">
                <div class="line-0">
                  <p>Dacia</p>
                  <span>2019</span>
                </div>

                <div class="info-sh">
                  <div class="first-row">
                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>

                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>
                  </div>

                  <div class="second-row">
                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>

                    <div class="line-1">
                      <i class="fa fa-whatsapp" aria-hidden="true"></i>
                      <p>4 People</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="btn-car">
                <p>250Dh <sub>/ day</sub></p>
                <a href="#">Rent Car</a>
              </div>
            </div> -->
      </section>
    </div>

    @include('master.footer')

    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
      $(function () {
        $(".select").select2();
      });
    </script>
  </body>
</html>
