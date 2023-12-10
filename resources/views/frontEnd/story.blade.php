<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{asset('fe/story.css')}}">

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
            <div class="logo"><a href="{{ route('home') }}">LOGO</a></div>
            
            <ul class="links">
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="{{ route('story') }}" class="active" >Our Story</a></li>
                {{-- <li><a href="menu.html">Menu</a></li> --}}
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
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

<!-- thumbnail -->
    <section id="hero">
        <div class="hero container">
                <h1>Our Story</h1>
        </div>
    </section>


    <!-- about us -->

    <section class="about" id="about">
        <div class="about-img">
            <img src="{{asset('fe/asset/story.png')}}" alt="">
        </div>

        <div class="about-content">
            <h2 class="heading">Bogota Jakarta</h2>
            <p>Fine dining in Bogotá is a sophisticated and vibrant experience that blends traditional Colombian flavors with modern and international culinary techniques. These establishments offer an elegant ambiance, diverse menus featuring creative interpretations of local dishes, and a focus on fresh, locally sourced ingredients. The culinary scene in Bogotá embraces cultural influences, and chefs are known for their creativity and commitment to providing impeccable service. Wine and cocktail pairings complement the high-quality dining experience, making it a memorable exploration of Colombia's rich culinary heritage in a refined setting.</p>
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