<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Tuime - Animal Food Website Template"/>
    <meta name="keywords" content="accessories, digital products, electronic html, modern, products, responsive"/>
    <meta name="author" content="hastech"/>

    <title>BigCar | Cars</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600&display=swap" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!--== Font Awesome Min Icon CSS ==-->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== 7 Stroke Icon CSS ==-->
    <link href="{{asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <!--== Swiper CSS ==-->
    <link href="{{asset('assets/css/swiper.min.css')}}" rel="stylesheet" />
    <!--== Fancybox Min CSS ==-->
    <link href="{{asset('assets/css/fancybox.min.css')}}" rel="stylesheet" />
    <!--== Range Slider Min CSS ==-->
    <link href="{{asset('assets/css/ion.rangeSlider.min.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
</head>

<body>

<!--wrapper start-->
<div class="wrapper">

  <!--== Start Preloader Content ==-->
  {{-- <div class="preloader-wrap">
    <div class="preloader">
      <div class="dog-head"></div>
      <div class="dog-body"></div>
    </div>
  </div> --}}
  <!--== End Preloader Content ==-->

  <!--== Start Header Wrapper ==-->
  @include('master.navbar')
  <!--== End Header Wrapper ==-->

  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area" data-bg-img="{{asset('assets/img/photos/bg1.jpg')}}">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Products</h2>
              <nav class="breadcrumb-area">
                <ul class="breadcrumb">
                  <li><a href="{{ route('home.index') }}">Home</a></li>
                  <li class="breadcrumb-sep">//</li>
                  <li>Cars
                    {{-- @foreach ($data  as $dat)
                    {{ $dat }}
                    @endforeach --}}
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="shop-top-bar">
              <div class="shop-top-left">
                <p class="pagination-line"><a href="shop.html">{{ $totalCars }}</a> Car Found </p>
              </div>
              <div class="shop-top-center">
                <nav class="product-nav">
                  <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                    <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list"></i></button>
                  </div>
                </nav>
              </div>
              <div class="shop-top-right">
                <div class="shop-sort">
                  <span>Sort By :</span>
                  <select class="form-select" aria-label="Sort select example">
                    <option selected>Default</option>
                    <option value="1">Popularity</option>
                    <option value="2">Average Rating</option>
                    <option value="3">Newsness</option>
                    <option value="4">Price Low to High</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-between">
          <div class="col-xl-9">
            <div class="row">
              <div class="col-12">
                <div class="banner-product-single-style2-item">
                  <div class="thumb">
                    <a href="shop.html">
                      <img src="{{asset('assets/img/shop/banner/3.webp')}}" width="870" height="247" alt="Image-HasTech">
                    </a>
                  </div>
                  <div class="content">
                    <h5 class="sub-title">-25%  Off </h5>
                    <h5 class="title">Pet Food, Medicin & Shop With Us</h5>
                    <a class="btn-theme-link" href="shop.html">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                    <div class="row">
                        @if ($availCars->count() >= 1)
                      @foreach ($availCars as $availCar)
                      <div class="col-sm-6 col-xl-4">
                        <!--== Start Product Item ==-->
                        <div class="product-item">
                          <div class="product-thumb">
                            <a href="{{ route('car_details', $availCar['id_car']) }}">
                              <img src="{{$availCar['img_car']}}" width="270" height="320" alt="Image-HasTech">
                            </a>
                          </div>
                          <div class="product-info">
                            <h4 class="title"><a href="{{ route('car_details', $availCar['id_car']) }}">{{ $availCar['name_car'] }}</a></h4>
                            <div class="prices">
                              <span class="price">{{ $availCar['price_car'] }} Dh</span>
                            </div>
                          </div>
                          <div class="product-action">
                            <button type="button" class="btn-product-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                              <i class="pe-7s-like"></i>
                            </button>
                            <div class="product-action-links">
                              <button type="button" class="btn-product-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                <i class="pe-7s-shopbag"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <!--== End prPduct Item ==-->
                      </div>
                      @endforeach
                      @else
                        Nothing
                      @endif
                      <div class="col-12">
                        <div class="pagination-items pagination-items-style1">
                          <ul class="pagination mb--0">
                            <li><a class="active" href="shop.html">1</a></li>
                            <li><a href="shop-four-columns.html">2</a></li>
                            <li><a href="shop-three-columns.html">3</a></li>
                            <li><a href="shop.html" class="icon"><i class="fa fa-angle-right"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                    <div class="row">
                      <div class="col-12">
                        <!--== Start Product Item ==-->
                        @foreach ($availCars as $availCar)
                        <div class="product-item product-list-item">
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="product-thumb">
                                <a href="{{ route('car_details', $availCar['id_car']) }}"">
                                  <img src="{{ $availCar['img_car'] }}" width="420" height="320" alt="Image-HasTech">
                                </a>
                                <div class="product-action">
                                  <button type="button" class="btn-product-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="pe-7s-like"></i>
                                  </button>
                                  <div class="product-action-links">
                                    <button type="button" class="btn-product-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                      <i class="pe-7s-look"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="product-info">
                                <h4 class="title"><a href="{{ route('car_details', $availCar['id_car']) }}">{{ $availCar['name_car'] }}</a></h4>
                                <div class="prices">
                                  <span class="price">{{ $availCar['price_car'] }}</span>
                                </div>
                                <p class="desc">{{ $availCar['desc_car'] }}</p>
                                <button type="button" class="btn-theme btn-sm" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                  Add To Cart
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <!--== End prPduct Item ==-->
                      </div>
                      <div class="col-12">
                        <div class="pagination-items pagination-items-style1">
                          <ul class="pagination mb--0">
                            <li><a class="active" href="shop.html">1</a></li>
                            <li><a href="shop-four-columns.html">2</a></li>
                            <li><a href="shop-three-columns.html">3</a></li>
                            <li><a href="shop.html" class="icon"><i class="fa fa-angle-right"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3">
            <div class="shop-sidebar">
              <div class="shop-sidebar-search">
                <div class="sidebar-search-form">
                  <form action="#">
                    <input type="search" placeholder="Search Here">
                    <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>
              </div>

              <div class="shop-widget shop-sidebar-price-range">
                <h4 class="sidebar-title">Price Filter</h4>
                <div class="sidebar-price-range">
                  <input type="range" class="js-range-slider range_slider" name="my_range" value="" data-type="double" data-min="50" data-max="2000" data-from="300" data-to="2500" />
                </div>
              </div>

              <div class="shop-widget shop-sidebar-category">
                <h4 class="sidebar-title">Categoris</h4>
                <div class="sidebar-category">
                  <ul class="category-list mb--0">
                  </ul>
                </div>
              </div>
              <div class="shop-widget shop-sidebar-color">
                <h4 class="sidebar-title">Color</h4>
                <div class="sidebar-color">
                  <div class="color-list">
                    <div data-bg-color="#ffd868"></div>
                    <div class="active" data-bg-color="#721b65"></div>
                    <div data-bg-color="#dd117e"></div>
                    <div data-bg-color="#0aa5d2"></div>
                  </div>
                </div>
              </div>
              <div class="shop-widget shop-sidebar-size">
                <h4 class="sidebar-title">Size</h4>
                <div class="sidebar-size">
                  <div class="size-list">
                    <div>S</div>
                    <div class="active">M</div>
                    <div>L</div>
                    <div>XL</div>
                  </div>
                </div>
              </div>
              <div class="shop-widget shop-sidebar-tags">
                <h4 class="sidebar-title">Tags</h4>
                <div class="sidebar-tags">
                  <ul class="tags-list mb--0">
                    <li><a href="shop.html">Fashion</a></li>
                    <li><a href="shop.html">Organic</a></li>
                    <li><a href="shop.html">Old Fashion</a></li>
                    <li><a href="shop.html">Men</a></li>
                    <li><a href="shop.html">Fashion</a></li>
                    <li><a href="shop.html">Dress</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
  </main>

  <!--== Start Footer Area Wrapper ==-->
  @include('master.footer')
  <!--== End Aside Menu ==-->
</div>

<!--=======================Javascript============================-->

<!--=== jQuery Modernizr Min Js ===-->
<script src="assets/js/modernizr.js"></script>
<!--=== jQuery Min Js ===-->
<script src="assets/js/jquery-main.js"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="assets/js/jquery-migrate.js"></script>
<!--=== jQuery Popper Min Js ===-->
<script src="assets/js/popper.min.js"></script>
<!--=== jQuery Bootstrap Min Js ===-->
<script src="assets/js/bootstrap.min.js"></script>
<!--=== jQuery Swiper Min Js ===-->
<script src="assets/js/swiper.min.js"></script>
<!--=== jQuery Fancybox Min Js ===-->
<script src="assets/js/fancybox.min.js"></script>
<!--=== jQuery Countdown Min Js ===-->
<script src="assets/js/countdown.js"></script>
<!--=== jQuery Isotope Min Js ===-->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!--=== jQuery Range Slider Min Js ===-->
<script src="assets/js/ion.rangeSlider.min.js"></script>
<!--=== jQuery Custom Js ===-->
<script src="assets/js/custom.js"></script>
<!--=== Ajax Cdn ===-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(e) {
        $('.range_slider').on('change', function() {
            alert('hi');
        });
    })
</script>
</body>

</html>
