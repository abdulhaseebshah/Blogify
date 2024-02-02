var swiper = new Swiper(".mySwiper", {
  loop: true,
  autoplay: true,
  autoplay: {
    delay: 5000,
  },
  speed: 1000, 
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
