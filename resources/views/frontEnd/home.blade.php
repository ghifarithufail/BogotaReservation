<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bogota Restaurant</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{asset('fe/home.css')}}">
    <!-- link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- scroll reveal  -->
    <script src="https://unpkg.com/scrollreveal@4"></script>

    <!-- swiper css  -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body>

    <!-- navbar  -->    
    <section id="header">
        <div class="navbar">
            <div class="logo"><a href="{{ route('home') }}">BOGOTA</a></div>
            
            <ul class="links">
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="{{ route('story') }}">Our Story</a></li>
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
            {{-- <li><a href="menu.html">Menu</a></li> --}}
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('rsvp') }}" class="action_btn">Reservation</a></li>
        </div>
    </section>


<!-- thumbnail -->
    <section id="hero">
        <div class="hero container">
                <h1>Bogota <br/>Restaurant </h1>
        </div>
    </section>


    <!-- about us -->

    <section class="about" id="about">
        <div class="about-img">
            <img src="{{asset('fe/asset/lights.png')}}" alt="">
        </div>

        <div class="about-content">
            <h2 class="heading">Our Story</h2>
            <p>Bogotá, the capital city of Colombia, has a vibrant and evolving culinary scene that includes a range of fine dining options. Fine dining establishments in Bogotá often combine traditional Colombian flavors with modern and international culinary techniques, resulting in a unique and delightful dining experience.</p>
            <a href="#" class="btn">Read More</a>
        </div>
    </section>

    <!-- section menu  -->

    <section class="menu" id="menu">
        <div class="menu-content">
            <h2 class="heading">Prime Tenderness Reserve</h2>
            <p>Prime Tenderness Reserve is one of the menus that we will serve to you. Prime Tenderness Reserve is highlighting the prime quality and exceptional tenderness of the steak, this name conveys a sense of exclusivity and premium dining.</p>
            <p>Indulge your palate in the extraordinary tenderness that defines our selection of prime cuts, carefully sourced and expertly prepared to deliver a sublime dining sensation. Our crown jewel is the renowned filet mignon, a masterpiece of culinary craftsmanship that promises a melt-in-your-mouth experience. Each bite is a celebration of tenderness, as our chefs meticulously handle and prepare the cuts to preserve the natural succulence.</p>
        </div>

        <div class="menu-img">
            <img src="{{asset('fe/asset/steik.jpg')}}" alt="">
        </div>
    </section>


    <!-- section interested  -->
    <section class="interest" id="int">
        <div class="int-img">
            <img src="{{asset('fe/asset/int.png')}}" alt="">
        </div>

        <div class="int-content">
            <h2 class="heading">Interested?</h2>
            <a href="{{ route('rsvp') }}" class="int-btn">RESERVATION NOW!</a>
        </div>
    </section>

    <!-- testimonials  -->

    <section class="testimonial-container">
        <h2 class="heading"> Testimonial</h2>

        <div class="testimonial-wrapper">
            <div class="testimonial-box mySwiper">
                <div class="testimonial-content swiper-wrapper">
                        <div class="testimonial-slide swiper-slide">
                            <img src="{{asset('fe/asset/ojan.jpeg')}}" alt="">
                            <h3>Fauzan Azmi</h3>
                            <p>My evening at Bogota Restaurant was nothing short of extraordinary. From the moment I walked in, the ambiance exuded elegance and sophistication. The attention to detail in the decor set the tone for a memorable dining experience. The service was impeccable, with a staff that was not only knowledgeable about the menu but also genuinely passionate about ensuring our satisfaction. </p>
                        </div>

                        <div class="testimonial-slide swiper-slide">
                            <img src="{{asset('fe/asset/hanida.jpeg')}}" alt="">
                            <h3>Hanida Adzkia</h3>
                            <p>Dining at Bogota Restaurant was an absolute delight. The atmosphere was enchanting, striking the perfect balance between opulence and warmth. The prime tenderness of the steaks was unlike anything I've experienced before. Each bite was a revelation, a testament to the chef's dedication to perfection. The staff's attentiveness and knowledge of the menu added to the overall enjoyment of the night.</p>
                        </div>
                        
                        <div class="testimonial-slide swiper-slide">
                            <img src="{{asset('fe/asset/bunga.jpg')}}" alt="">
                            <h3>Bunga Permata Hilias</h3>
                            <p>Celebrating our anniversary at Bogota Restaurant was a decision we'll cherish forever. The restaurant's intimate and sophisticated ambiance provided the perfect backdrop for our special occasion. From the moment we were seated, the staff went above and beyond to make us feel celebrated. Bogota Restaurant turned a memorable day into an unforgettable celebration of love, and we can't wait to return for more special moments.</p>
                        </div>
                    
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
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



    <!-- swiper js  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- custom js -->
    <script src="{{asset('fe/script.js')}}"></script>
</body>
</html>