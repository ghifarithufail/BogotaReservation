<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{asset('fe/status.css')}}">

    <!-- link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- scroll reveal  -->
    <script src="https://unpkg.com/scrollreveal@4"></script>

    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- swiper js  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    </head>

<body>

    <!-- navbar  -->
    <section id="header">
        <div class="navbar">
            <div class="logo"><a href="{{ route('home') }}">BOGOTA</a></div>
        </div>
    </section>


<!-- thumbnail -->
    <section id="hero">
        <div class="hero container">
                <h1>Payment</h1>
        </div>
    </section>


    <!-- payment -->
    <section id="payment">
        <div class="container1">
            <h1>Reservation Details</h1>

            <div class="details">
                <div class="nama">
                    <h3>Name :</h3>
                    <p>{{ $reservasi->name }}</p>
                </div>
                <div class="email">
                    <h3>Email :</h3>
                    <p>{{ $reservasi->email }}</p>
                </div>
                <div class="date">
                    <h3>Reservation Date :</h3>
                    <p>{{ $reservasi->date->format('D d-M-Y') }}</p>
                </div>
                <div class="time">
                    <h3>Time Reservation :</h3>
                    <p>{{ $reservasi->time }}</p>
                </div>
                <div class="number">
                    <h3>Table Number :</h3>
                    <p>{{ $reservasi->Tables->tables_name }}</p>
                </div>
                <div class="people">
                    <h3>Total Guest :</h3>
                    <p>{{ $reservasi->guest }} Orang</p>
                </div>
                <div class="status">
                    <h3>Status :</h3>
                    <p>
                        @if ($reservasi->status == 'done')
                            PAID
                        @endif
                    </p>
                </div>
            </div>

        </div>
        

        <div class="container2">
            <h1>Payment</h1>

                <div class="total">
                    <h3>Total :</h3>
                    <p>Rp{{ $reservasi->price }}</p>
                </div>

            <div class="notes">
                <p>1. If you do not pay within 24 hours of the reservation you made, your order will be canceled automatically.</p>
                <p>2. You will get the invoice after making the payment</p>
                <p>3. Make sure your reservation data is correct</p>
            </div>

            <div id="status">
                <a href="{{ route('invoice/download', $reservasi->id) }}" target="_blank" id="pdfLink">
                    <button type="submit" class="btn" id="status">Download</button>
                </a>
            </div>

        </div>


    </section>
    <!-- section footer  -->

    <footer>
        <h1>Bogota Jakarta</h1>
        <div class="containerf">
            <div class="sec address">
                <h2>Address</h2>
                <p>Jalan Sudirman no.123, <br>South Central Business District, Jakarta Selatan, DKI Jakarta, Indonesia</p>
            </div>

            <div class="sec contact">
                <h2>Contact Us</h2>
                <ul class="info">
                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i>  Bogota Jakarta</a></li>
                    <li><a href="#"><i class="fa-brands fa-twitter"></i>  @bogota.jkt</a></li>
                    <li><a href="#"><i class="fa-brands fa-square-instagram"></i>  @bogota.jkt</a></li>
                </ul>
            </div>

            <div class="sec working hour">
                <h2>Working Hour</h2>
                <ul>
                    <li><p>Tuesday - Sunday</p></li>
                    <li><p>17.00 - 21.00</p></li>
                    <li><p>For special reservation <br>please call us on 082132364617</p></li>
                </ul>
            </div>
        </div>
    </footer>

    <div class="copyrightText">
        <p>Copyright 2023, Bogota Jakarta. All Rights Reserved.</p>
    </div>


    <!-- custom js -->
    <script src="{{asset('fe/script.js')}}"></script>
    <script>
        document.getElementById('pdfLink').addEventListener('click', function(e) {
            e.preventDefault();
            const pdfUrl = this.getAttribute('href');

            const newWindow = window.open(pdfUrl, '_blank');

            newWindow.addEventListener('load', function() {
                newWindow.print();
            });
        });
    </script>

</body>
</html>