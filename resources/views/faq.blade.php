<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    />
    <link rel="stylesheet" href="{{asset('assets/css/style1.css')}}" />
    <title>FaQ | JACARANDCAR</title>
    <style>
        h3 {
            text-transform: capitalize;
        }
    </style>
</head>
<body>
    @include('master.navbar')

    <div class="container">
        <div class="panel">
          <h1>FAQ</h1>
        </div>
    </div>

    <section class="faq_section">
        <h2 class="title">General Questions</h2>
        <p style="margin-bottom: 30px">
            You’ll find in this section all the frequently asked question. </br>
            If you need further information, feel free to <a href="{{ route('home.contcat') }}"> Contact us</a>.
        </p>
        <div class="faq">
            <div class="question">
                <h3>How do I Rent a Car</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>

            <div class="answer">
                <p>
                    You can rent a car by simply clicking on the home button in the menu or by calling +212 662 151 010 . If you choose to reserve a car online, we will contact you to confirm your reservation.
                </p>
            </div>
        </div>
        <div class="faq">

            <div class="question">
                <h3>Can I Change The Car After The Reservation</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>

            <div class="answer">
                <p>
                    Yes. If you would like to change or cancel your reservation of a car after approving it, please visit Modify Reservation Page, call +212 662 151 010 or reach us by contacts provided in the Contacts page.
                </p>
            </div>
        </div>
        <div class="faq">

            <div class="question">
                <h3>Can I book the same day of the rental? </h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>

            <div class="answer">
                <p>
                    Yes, you can do it until 24h working before departure. provided, Jacarandacar will only be able to offer you the categories of similar cars that are still available
                </p>
            </div>
        </div>
        <div class="faq">

            <div class="question">
                <h3>Is Car Delivery Free?</h3>
                <svg width="15" height="10" viewBox="0 0 42 25">
                    <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round" />
                </svg>
            </div>

            <div class="answer">
                <p>
                    -Yes, you can be delivered for free to the airport or to the hotel or even to your home at no extra charge, this service is free only in Marrakech, for other cities there is a supplement which varies depending on the city
                </p>
            </div>
        </div>
    </section>

    @include('master.footer')

    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
        const faqs = document.querySelectorAll(".faq");
        faqs.forEach(faq => {
            faq.addEventListener("click", () => {
                faq.classList.toggle("active");
            });
        });
    </script>
</body>
</html>
