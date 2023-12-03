<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- link css -->
    <link rel="stylesheet" href="home.css">

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
            <div class="logo"><a href="home.html">LOGO</a></div>
            
            <ul class="links">
                <li><a href="home.html" class="active">Home</a></li>
                <li><a href="story.html">Our Story</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="contus.html">Contact Us</a></li>
            </ul>

            <a href="" class="action_btn">RESERVE</a>
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


<!-- thumbnail -->
    <section id="hero">
        <div class="hero container">
                <h1>Bogota <br/>Restaurant </h1>
        </div>
    </section>


    <!-- about us -->

    <section class="about" id="about">
        <div class="about-img">
            <img src="pics/lights.png" alt="">
        </div>

        <div class="about-content">
            <h2 class="heading">Our Story</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit in rem error omnis doloremque, aspernatur maiores magnam ratione facilis repudiandae ut consequuntur saepe et ullam dolorem, maxime sint provident quae!</p>
            <p><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam libero ratione pariatur quod, similique saepe est quasi maiores perferendis officia.</br></p>
            <a href="#" class="btn">Read More</a>
        </div>
    </section>

    <!-- section menu  -->

    <section class="menu" id="menu">
        <div class="menu-content">
            <h2 class="heading">Menu</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit in rem error omnis doloremque, aspernatur maiores magnam ratione facilis repudiandae ut consequuntur saepe et ullam dolorem, maxime sint provident quae!</p>
            <p><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam libero ratione pariatur quod, similique saepe est quasi maiores perferendis officia.</br></p>
        </div>

        <div class="menu-img">
            <img src="pics/steik.jpg" alt="">
        </div>
    </section>


    <!-- section interested  -->
    <section class="interest" id="int">
        <div class="int-img">
            <img src="pics/int.png" alt="">
        </div>

        <div class="int-content">
            <h2 class="heading">Interested?</h2>
            <a href="#" class="int-btn">RESERVATION NOW!</a>
        </div>
    </section>

    <!-- testimonials  -->

    <section class="testimonial-container">
        <h2 class="heading"> Testimonial</h2>

        <div class="testimonial-wrapper">
            <div class="testimonial-box mySwiper">
                <div class="testimonial-content swiper-wrapper">
                    <div class="testimonial-slide swiper-slide">
                        <img src="pics/ojan.jpeg" alt="">
                        <h3>Fauzan Azmi</h3>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae impedit minus praesentium possimus illo modi ipsam provident facere fugiat atque sequi commodi ea ipsa nobis sed asperiores cupiditate est natus nulla perferendis vitae nemo, animi fugit aut? Quaerat, error inventore officiis perspiciatis, magni eaque, iusto illum eligendi enim quisquam unde! Veniam molestiae quos illo deserunt consequatur, delectus inventore dolorem corrupti. </p>
                    </div>

                    <div class="testimonial-slide swiper-slide">
                        <img src="pics/hanida.jpeg" alt="">
                        <h3>Hanida Adzkia</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora at delectus illum minus, voluptatum perferendis assumenda alias non suscipit exercitationem dolorum cum architecto explicabo aspernatur, ut incidunt? Quibusdam, maxime. Animi aliquam obcaecati mollitia recusandae consequatur veritatis vel alias, nesciunt dolor. Totam expedita culpa praesentium consequatur. Harum perferendis est saepe ullam?</p>
                    </div>
                    
                    <div class="testimonial-slide swiper-slide">
                        <img src="pics/bunga.JPG" alt="">
                        <h3>Bunga Permataa</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium earum excepturi reiciendis aliquam itaque eligendi maiores quas vitae, soluta deleniti impedit ipsam eius doloribus, sunt, reprehenderit eos sed cumque omnis facere aut enim. Unde recusandae sed rerum minus distinctio odio labore at culpa quidem, exercitationem eveniet! Neque deserunt enim obcaecati nihil! Quam delectus asperiores iure assumenda quos facere, exercitationem laborum.</p>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- section footer 

    <footer>
        <div class="containerf">
            .sec
        </div>
    </footer> -->

    <!-- swiper js  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- custom js -->
    <script src="script.js"></script>

</body>
</html>