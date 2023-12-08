<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>

    <!-- link css -->
    <link rel="stylesheet" href="{{asset('fe/rsvp.css')}}">

    <!-- link font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <!-- scroll reveal 
    <script src="https://unpkg.com/scrollreveal@4"></script>

    swiper css
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    swiper js 
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->

    </head>

<body class="main-bg">

    <!-- navbar  -->
    <section id="header">
        <div class="navbar">
            <div class="logo"><a href="home.html">LOGO</a></div>
            
            <ul class="links">
                <li><a href="home.html">Home</a></li>
                <li><a href="story.html">Our Story</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="contus.html" class="active">Contact Us</a></li>
            </ul>

            <a href="rsvp.html" class="action_btn">RESERVE</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="home.html">Home</a></li>
            <li><a href="story.html">Our Story</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="contus.html">Contact Us</a></li>
            <li><a href="rsvp.html" class="action_btn">Reservation</a></li>
        </div>
    </section>


    <!-- main rsvp -->

    <section class="form">
        <div class="form-text">
            <h1><span><img src="pics/art-1.png" alt=""></span> Book Now <span><img src="pics/art-1.png" alt=""></span></h1>
            <p>Book Your Table Now And Have A Great Meal!</p>
        </div>

        <div class="main-form">
            <form action="" method="get">
                <div>
                    <span>Full Name</span>
                    <input type="text" name="name" placeholder="Enter Your Name" required>
                </div>

                <div>
                    <span>Email</span>
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                </div>

                <div>
                    <span>Reservation Date</span>
                    <input type="date" name="date" placeholder="Enter Your Reservation Date" required>
                </div>

                <div>
                    <span>Time Reservation</span>
                    <select name="time" id="time" required>
                        <option value="">--Time Reservation--</option>
                        <option value="1">16.00 - 18.00</option>
                        <option value="2">19.00 - 21.00</option>
                    </select>
                </div>

                <div>
                    <span>Time Reservation</span>
                    <select name="table" id="table" required>
                        <option value="">--Table Reservation--</option>
                        <option value="1">A1</option>
                        <option value="2">A2</option>
                        <option value="3">A3</option>
                    </select>
                </div>

                <div>
                    <span>Total Guest</span>
                    <select name="people" id="people" required>
                        <option value="">--People--</option>
                        <option value="1">2 People</option>
                        <option value="2">3 People</option>
                        <option value="3">4 People</option>
                    </select>
                </div>

                <div class="input-box message-box">
                    <span>Note</span>
                    <textarea placeholder="Enter Your Note"></textarea>
                </div>

                <div id="submit">
                    <button type="submit" id="submit">Next</button>
                </div>
            </form>
        </div>
    </section>

    <!-- section footer  -->

    <section class="footer">
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

    </section>
    <!-- custom js -->
    <script src="{{asset('fe/script.js')}}"></script>

</body>
</html>