<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{asset('fe/contus.css')}}">

    <!-- link font-awesome -->  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- scroll reveal 
    <script src="https://unpkg.com/scrollreveal@4"></script>

    swiper css
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    swiper js 
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

    <!-- navbar  -->
    <section id="header">
        <div class="navbar">
            <div class="logo"><a href="{{ route('home') }}">BOGOTA</a></div>
            
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

                <form action="{{ route('critic.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-box">
                        <input type="text" name="name" placeholder="Enter your name here">
                    </div>
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Enter your email here">
                    </div>
                    <div class="input-box messsage-box">
                        <input name="critics" placeholder="Enter your suggestion here">
                    </div>
                    <div class="button">
                        <button type="submit">Send Now</button>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom js -->
    <script src="{{asset('fe/script.js')}}"></script>

    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")

        @endif
    </script>
</body>
</html>