<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="('assets/css/style1.css')" />
    <title>Document</title>
</head>
<body>
    <div class="side-menu" id="side-menu">
        <div class="orange"></div>
        <div class="soc-media">
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
          <i class="fa fa-facebook" aria-hidden="true"></i>
          <i class="fa fa-instagram" aria-hidden="true"></i>
          <i class="fa fa-telegram" aria-hidden="true"></i>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="logo">
                Big <br />
                Car
            </div>
            <div class="add">
                <p>Appt 3, Centre d´Affaires Al Abraj, 40007 Marrakesh</p>
                <p>+212 612345678</p>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="heading_pdf">Reçu De Paiement</h1>
    </div>

    <section>
        <div class="container">
            <div class="info-trans">
                <table class="table" style="color: black">
                    <tbody>
                      <tr>
                        <th scope="row">Id Transaction</th>
                        <td>{{ $request->trans_number }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Car Name</th>
                        <td>{{ $request->name_car }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Pick In</th>
                        <td colspan="2">{{ $request->first_date }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Pick Out</th>
                        <td colspan="2">{{ $request->last_date }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Total Price</th>
                        <td colspan="2">{{ $request->prix_total }} Dh</td>
                      </tr>
                      <tr>
                        <th scope="row">Command Date</th>
                        <td colspan="2">
                            @php
                                echo date("Y/m/d");
                            @endphp
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">Payement</th>
                        <td colspan="2">On Agence</td>
                      </tr>
                    </tbody>
                  </table>
                  {{-- <p style="text-align: center; color: red; margin-top: 10px"><b> 24H And Your Order Will Be Deleted If You Don't Come To Pay </b></p> --}}
            </div>
        </div>
    </section>

</body>
</html>
