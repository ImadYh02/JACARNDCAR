<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"
        />
        <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        />
        <title>Contact Us | JACARANDCAR</title>

    </head>
    <body>
        @include('master.navbar')

        <div class="container">
            <div class="panel">
              <h1>Cotact Us</h1>
            </div>
        </div>

        @if (Session::has('message_sent'))
        <div class="container">
            <div class="message">
                <div class="alert">
                    {{ Session::get('message_sent') }}
                </div>
                @endif
            </div>
        </div>


        <div class="contact-wrap">
            <div class="contact-in">
                <h1>Contact Info</h1>
                <h2><i class="fa fa-phone" aria-hidden="true"></i> Phone</h2>
                <p>+212 662 151 010 </p>
                <h2><i class="fa fa-envelope" aria-hidden="true"></i> Email</h2>
                <p>info@jacarandacar.com </p>
                <h2>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Address
                </h2>
                <p>07 Avenue 11 Janvier, Immeuble Al Abraj, entrée C n°3 Marrakech, Marrakesh - Maroc</p>
                <ul>
                    <li>
                        <a href="#"
                            ><i class="fa-brands fa-facebook" aria-hidden="true"></i
                        ></a>
                    </li>
                    <li>
                        <a href="#"
                            ><i class="fa-brands fa-twitter" aria-hidden="true"></i
                        ></a>
                    </li>
                    <li>
                        <a href="#"
                            ><i class="fa-brands fa-google" aria-hidden="true"></i
                        ></a>
                    </li>
                    <li>
                        <a href="#"
                            ><i class="fa-brands fa-instagram" aria-hidden="true"></i
                        ></a>
                    </li>
                </ul>
            </div>
            <div class="contact-in">
                <h1>Send a Message</h1>
                <form action="{{route('get_contact')}}" method="POST">
                    @csrf
                    <input
                        type="text"
                        name="name"
                        placeholder="Full Name"
                        class="contact-in-input"
                    />
                    <input
                        type="text"
                        name="email"
                        placeholder="Email"
                        class="contact-in-input"
                    />
                    <input
                        type="text"
                        name="subject"
                        placeholder="Subject"
                        class="contact-in-input"
                    />
                    <textarea
                        name="message"
                        placeholder="Message"
                        class="contact-in-textarea"
                    ></textarea>
                    <button
                        type="submit"
                        class="contact-in-btn">Send
                    <button>
                </form>
            </div>
        </div>

        @include('master.footer')

        <script src="{{asset('assets/js/script.js')}}"></script>
    </body>
</html>
