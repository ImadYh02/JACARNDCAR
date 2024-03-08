<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
    {{-- <title>jacarandacar</title> --}}
    <title>JACARANDCAR</title>
  </head>

  <body>
    @include('master.navbar')

    <main>
      <div class="col-1">
        <div class="text-home">
          <h1>{{__('all.Drive your way')}}</h1>
          {{-- <p>{{ __('all.heading-1') }}</p> --}}
          <p>
            {{__('all.home-desc')}}
          </p>
        </div>
        <form action="{{ route('home.showAllCat') }}">
            @csrf
          <div class="booking-form">
            <div class="top-form">
              <div class="left-form">
              <p>{{__('all.pu-info')}}</p>
                <select name="pick_up_location" id="pick_up_location">
                    <option selected disabled value="0">{{__('all.pu-dd')}}</option>
                    @foreach ($locations as $location)
                        <option value={{$location->name_location}}>{{$location->name_location}}</option>
                    @endforeach
                </select>
              <input type="date" class="txtDate" name="first_day" id="first_day">
              </div>
              <div class="right-form">
              <p>{{ __('all.r-info') }}</p>
              <select name="return_location" id="return_location" class="select">
                <option selected disabled value="0">{{__('all.r-dd')}}</option>
                @foreach ($locations as $location)
                    <option value={{$location->name_location}}>{{$location->name_location}}</option>
                @endforeach
              </select>
              <input type="date" class="txtDateR" name="last_day" id="last_day">
              </div>
            </div>
            <div class="btn-form">
              <button style="background-color: #d8aa1e" onclick="storeDates()" type="submit" id="btn_booking" class="btn-login">{{__('all.Check Availability')}}</button>
            </div>
          </div>
        </form>
      </div>
      <div class="flesh">
        <a href="#about">
            <i class="fa fa-angle-double-down" aria-hidden="true"></i>
        </a>
      </div>
      <img src="./assets/pic/bg-6.jpg" alt="" />
    </main>

    <!-- <div class="brush"></div> -->

    <section class="hidden about_section" id="about">
      <div class="about_img">
        <img src="./assets/pic/about-us.png" alt="" />
      </div>
      <div class="about_details">
        <h1>{{__('all.about-heading')}}</h1>
        <p>
            {{__('all.about-desc')}}
        </p>
        <!-- <div class="btns">
          <a href="#" class="btn btn1">HIRE ME</a>
          <a href="#" class="btn btn2">DOWNLOAD CV</a>
        </div> -->
      </div>
    </section>

    {{-- <h1 class="feedback">Vehicle Brands</h1>
    <p style="text-align: center; font-size: 20px">
        We work with teh following brands
      </p>
    <section class="hidden brands">
      <div class="container">
        <div class="img-brand">
          <img src="./assets/pic/bg-2.jpg" alt="">
          <img src="./assets/pic/bg-2.jpg" alt="">
          <img src="./assets/pic/bg-2.jpg" alt="">
          <img src="./assets/pic/bg-2.jpg" alt="">
        </div>
      </div>
    </section> --}}

    <section class="img-index">
        <div class="content">
            <h1>{{ __('all.heading-img-index') }}</h1>
            <p>{{ __('all.paragraph-img-index') }}</p>
            <a href="#">{{ __('all.button-img-index') }}</a>
        </div>
    </section>

    <h1 class="feedback">{{__('all.ocs-heading')}}</h1>
    <div class="container">
        <div class="body" id="feedback">
            <figure class="hidden snip1157">
              <blockquote>
                  {{__('all.ocs-cmnt1')}}
                <div class="arrow"></div>
              </blockquote>
              <img
                src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample3.jpg"
                alt="sq-sample3"
              />
              <div class="author">
                <h5>Pelican Steve <span> LIttleSnippets.net</span></h5>
              </div>
            </figure>
            <figure class="hidden snip1157 hover">
              <blockquote>
                  {{__('all.ocs-cmnt1')}}
                <div class="arrow"></div>
              </blockquote>
              <img
                src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample27.jpg"
                alt="sq-sample27"
              />
              <div class="author">
                <h5>Max Conversion<span> LIttleSnippets.net</span></h5>
              </div>
            </figure>
            <figure class="hidden snip1157">
              <blockquote>
                  {{__('all.ocs-cmnt1')}}
                <div class="arrow"></div>
              </blockquote>
              <img
                src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg"
                alt="sq-sample17"
              />
              <div class="author">
                <h5>Eleanor Faint<span> LIttleSnippets.net</span></h5>
              </div>
            </figure>
          </div>
    </div>

    <h1 class="contact_us" style="margin-bottom: -100px">{{__('all.heading-cu')}}</h1>
    <section class="hidden contact" id="contact">
      <div class="container">
        <div class="row">
          <div class="contact_form">
            <div class="col-1">
              <i class="fa fa-home" aria-hidden="true"></i>
              <p>07 Avenue 11 Janvier, Immeuble Al Abraj, entrée C n°3 Marrakech, Marrakesh - Maroc</p>
            </div>
            <div class="col-1">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <p>+212 612345678</p>
            </div>
            <div class="col-1">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <p>info@jacarandacar.com</p>
            </div>
            <div class="col-1">
              <i class="fa fa-globe" aria-hidden="true"></i>
              <p>Lun. - Ven. 10:00 - 19:00 | Sam. 10:00 - 12:00</p>
            </div>
          </div>
          <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.7963855351213!2d-8.000651482556151!3d31.63942490000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafefee6c6c6357%3A0xbbc7136983036de4!2s%F0%9F%A5%87Jacaranda%20car%20rental%20airport%20in%20Marrakech!5e0!3m2!1sen!2sma!4v1669814644526!5m2!1sen!2sma"
                width="600" height="350" style="border:0;"
                allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
    </section>

    @include('master.footer')

    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
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
        // $('.txtDateR').attr('min', maxDate);
      });

      $(function() {
            $('.txtDate').on('change', function () {
                let id = $(this).val();
                $('.txtDateR').attr('min', id);
            });
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
  </body>
</html>
