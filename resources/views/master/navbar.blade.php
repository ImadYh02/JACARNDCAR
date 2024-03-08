
    <div class="scroller" id="scroller"></div>

    <button id="scroll">^</button>

    <div class="side-menu" id="side-menu">
      <div class="orange"></div>
      <div class="soc-media">
        <i class="fa-brands fa-whatsapp"></i>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-telegram"></i>
      </div>
    </div>

    <div class="sous-bar">
        <div class="container">

        <div class="right-sb">
            <div class="mail">
                <i class="fa-solid fa-envelope"></i>
                <p>
                  <a href="mailto:info@jacarandacar.com">
                    info@jacarandacar.com
                  </a>
                </p>
            </div>
            <div class="phone">
                <i class="fa-sharp fa-solid fa-phone"></i>
                <p>
                  <a href="tel:+212662151010">
                    +212 662 151 010
                  </a>
                </p>
            </div>
            <div class="time">
                <span></span>
                <p class="today"> </p>
            </div>
        </div>

        <div class="left-sb">
            <div class="lng">
                <i class="fa fa-language" aria-hidden="true"></i>
                <button id="" class="btn_drop" onclick="show_hide_drop_lng()">
                    {{-- <p>{{ __('all.Frensh')}}</p> --}}
                    <p>{{ LaravelLocalization::getCurrentLocaleNative() }}</p>
                </button>
                <div id="drop_lng" class="drop-down dd-lng hide">
                    <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                            {{-- <li><a href="">{{ __('all.Frensh')}}</a></li>
                            <li><a href="">{{ __('all.Arabic')}}</a></li> --}}
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- <div class="cur">
                <i class="fa-solid fa-money-bill-wave"></i>
                <button class="btn_drop" onclick="show_hide_drop_cur()">
                    <p>Dollar</p>
                </button>
                <div id="drop_cur" class="drop-down dd-cur hide">
                    <ul>
                        <li> <a href="#">Dirham</a> </li>
                        <li> <a href="#">Euro</></a> </li>
                        <li> <a href="#">Dollar</a> </li>
                    </ul>
                </div>
            </div> --}}
            <div class="dark-light" style="margin-left: 30px;">
              <a style="cursor: pointer" onclick="changeIcon(this)">
                <i class="fa-solid fa-moon"></i>
              </a>
            </div>
        </div>
    </div>
      </div>

    <header id="home">
      <div class="container">
        <!-- <img width="50px" src="https://www.pngkey.com/png/detail/116-1160790_rpi-logo-white-screen-crowne-plaza-white-logo.png" alt="Rpi Logo White Screen - Crowne Plaza White Logo@pngkey.com">  -->
        <div class="logo">
          Big <br />
          Car
        </div>
        <div class="links">
          <ul>
            <li><a href="{{ route('home.index') }}">{{__('all.home')}}</a></li>
            <li><a href="{{ route('home.cars') }}">{{__('all.cars')}}</a></li>
            {{-- <li><a href="{{ route('home.index') }}">About Us</a></li> --}}
            <li><a href="{{ route('home.faq') }}">{{__('all.faq')}}</a></li>
            <li><a href="{{ route('home.contcat') }}">{{__('all.contact')}}</a></li>
          </ul>
        </div>
        <div class="icons">
          @auth
          <i onclick="showMenuUser()" class="fa fa-user" aria-hidden="true" style="font-size: 30px"></i>
          <div class="menu-user">
            <p>{{auth()->user()->first_name}}</p>
            <ul>
              <li>
                <a style="margin-bottom: 30px;" href="{{route('user.orders', auth()->user()->cin_user)}}"><i class="fa fa-ticket" aria-hidden="true"></i>
                    My Reservation</a>
                {{-- <a href="{{route('setting')}}"><i class="fa fa-cog" aria-hidden="true"></i>
                    Setting</a> --}}
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button style="background-color: grey; outline: none; border: 0px; margin: 0 10px; cursor: pointer">
                        <i style="margin-left: -2px;" class="fa fa-sign-out" aria-hidden="true"></i>
                        <span style="margin-left: 10px">Log Out</span>
                    </button>
                </form>
              </li>
            </ul>
          </div>
          @else
          <a class="login" href="{{route('login')}}"> {{__('all.login')}} </a>
          @endauth
          {{-- <button type="submit" onclick="lightMode()" style="width: 10px" class="login"> Light Mode </button> --}}
        </div>
      </div>
    </header>
