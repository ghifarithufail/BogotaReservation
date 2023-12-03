// navbar banget

const toggleBtn = document.querySelector('.toggle_btn')
const toggleBtnIcon = document.querySelector('.toggle_btn i')
const dropDownMenu = document.querySelector('.dropdown_menu')

toggleBtn.onclick = function (){
    dropDownMenu.classList.toggle('open')
    const isOpen = dropDownMenu.classList.contains ('open')

    toggleBtnIcon.classList = isOpen
    ? 'fa-solid fa-xmark'
    : 'fa-solid fa-bars'
}

  /*====== Sticky Navbar =====*/

  window.onscroll = () => {

    let header = document.querySelector('#header');

    header.classList.toggle('sticky', window.scrollY > 100);

};

// scroll reveal 
ScrollReveal ({
  reset : true, 
  distance : '80px',
  duration : 2000,
  delay: 200
});

ScrollReveal().reveal('.hero, img', {origin : 'left'});
ScrollReveal().reveal('.heading, p', {origin : 'right'});
ScrollReveal().reveal('.btn, .int-btn', {origin : 'bottom'});

// swiper 
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});