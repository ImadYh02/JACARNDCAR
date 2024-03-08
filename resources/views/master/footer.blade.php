<div class="container" style="width: 100%;">
    <section class="footer">
      <div class="footer-n">
        <div class="about-footer">
            <h1>Jacarandacar</h1>
            <p style="margin-top: 50px;">
            Luxury Car Rental is a company born from the love of exotic and
            luxury cars, and our desire to make these very exclusive brands and
            models available for everyone to enjoy.
            </p>
        </div>

        <div class="hours-footer">
            <h1>Opennig Hours</h1>
            <div class="opennin-hours" style="margin-top: 50px;">
                <p>Monday-Friday: 09:00 – 18:00</p>
                <p style="margin: 12px 0;"> Saturday: 09:00 – 13:00</p>
                <p> Sunday: Closed</p>
            </div>
        </div>

        <div class="tags-footer">
            <h1>Our Tags</h1>
            <div class="tags-link" style="margin-top: 50px;">
                <a href="#">Agence de location de voitures à Marrakech</a>
                <a href="#">Location de voiture Marrakech</a>
                <a href="#">Location de voiture Marrakech pas cher</a>
                <a href="#">Location 4x4 Marrakech</a>
                <a href="#">Location voiture marrakech sans carte de credit</a>
            </div>
        </div>

        <div class="follow-footer">
            <h1 style="text-align: center; margin-bottom: 50px">Follow Us</h1>
            <div class="link-soc" style="margin-top: 50px;">
                <a href="{{ route('home.index') }}">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
                <a href="{{ route('home.index') }}">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="{{ route('home.index') }}">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="{{ route('home.index') }}">
                    <i class="fa-brands fa-telegram"></i>
                </a>
            </div>
        </div>
      </div>
      <div class="sous-footer">
        <p>
            &copy @php
                echo date('Y')
            @endphp Copyright by JACARANDCAR | All Rights Reserved.
        </p>
      </div>
    </section>
    {{-- <section class="sous-footer" style="background-color: #d8aa1e; height: 100px; position: absolute; bottom: 0">
      <p>
          2022 Copyright by Luxury Car Rental | All Rights Reserved.
      </p>
  </section> --}}
  </div>
