$(document).ready(function () {
  const main_slider = $("#main-slider");
  main_slider.owlCarousel({
    rtl: false,
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000, // Durasi slide
    autoplaySpeed: 1000, // Kecepatan transisi otomatis
    smartSpeed: 1000, // Kecepatan transisi manual
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1,
      },
    },
  });
  visu;
});
