$(document).ready(function () {
  const main_slider = $("#main-slider");
  main_slider.owlCarousel({
    rtl: false,
    loop: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: false,
    responsive: {
      0: {
        items: 1,
      },
    },
  });

  // Custom Navigation Events
  $(".customNextBtn").click(function () {
    main_slider.trigger("next.owl.carousel");
  });
  $(".customPrevBtn").click(function () {
    main_slider.trigger("prev.owl.carousel");
  });
});
