<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{asset('fe/contus.css')}}">

    <!-- link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- scroll reveal 
    <script src="https://unpkg.com/scrollreveal@4"></script>

    swiper css
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    swiper js 
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->

    </head>

<body>

    <!-- navbar  -->
    <section id="header">
        <div class="navbar">
            <div class="logo"><a href="{{ route('home') }}">LOGO</a></div>
            
            <ul class="links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('story') }}">Our Story</a></li>
                {{-- <li><a href="menu.html">Menu</a></li> --}}
                <li><a href="{{ route('contact') }}" class="active">Contact Us</a></li>
            </ul>

            <a href="{{ route('rsvp') }}"  class="action_btn">RESERVE</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('story') }}">Our Story</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('rsvp') }}" class="action_btn">Reservation</a></li>
        </div>
    </section>


    <!-- main contactus -->

    <section id="hero">
        <div class="hero container">
                <h1>Contact Us </h1>
        </div>
    </section>


    <section class="cont con-suggest">
        <div class="content">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Jalan Sudirman no.123,</div>
                    <div class="text-two">South Central Business District,</div>
                    <div class="text-three">Jakarta Selatan, DKI Jakarta, Indonesia</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">(021) 238-913-639</div>
                    <div class="text-two">+6281-3047-1048</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">restaurantbogota8@gmail.com</div>
                </div>
            </div>

            <div class="right-side">
                <div class="topic-text">Send Us Suggestion</div>
                <p>JIf you have criticism and suggestions or complaints that you have at Bogota Restaurant, you can directly send it through the form below. We are happy to read and accept your feedback to help us build Bogota Restaurant ahead.</p>

                <form action="#">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name here">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Enter your email here">
                    </div>
                    <div class="input-box messsage-box">
                        <textarea placeholder="Enter your suggestion here"></textarea>
                    </div>
                    <div class="button">
                        <input type="button" value="Send Now">
                    </div>
                </form>
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

</body>
</html>