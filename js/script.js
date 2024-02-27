jQuery(document).ready(function ($) {

  //slider
  var swiperRead = new Swiper(".read-slider", {
    slidesPerView: 1.15,
    spaceBetween: 25,
    breakpoints: {
      500: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 55,
      },

    },
    navigation: {
      nextEl: ".read-next",
      prevEl: ".read-prev",
    },
    pagination: {
      el: ".read-pagination",
      clickable: true,
    },
  });

  //slider
  var swiperTestimonials = new Swiper(".testimonials-slider", {
    slidesPerView: 1,
    spaceBetween: 25,
    breakpoints: {
      500: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 32,
      },

    },
    navigation: {
      nextEl: ".testimonials-next",
      prevEl: ".testimonials-prev",
    },
    pagination: {
      el: ".testimonials-pagination",
      clickable: true,
    },
  });


  //open mob menu
  $(document).on('click', '.open-menu a', function (e){
    e.preventDefault();

    $(this).toggleClass('is-active');

    if($(this).hasClass('is-active')){
      $.fancybox.open( $('#menu-responsive'), {
        touch:false,
        autoFocus:false,
      });
      setTimeout(function() {

        $('html').addClass('is-menu');
        $('header').addClass('is-active');
      }, 100);
    }else{
      $.fancybox.close();
      $('html').removeClass('is-menu');
      $('header').removeClass('is-active');
    }

  });

  //faq
  $(function() {
    $(".accordion > .accordion-item.is-active").children(".accordion-panel").slideDown();
    $(document).on('click', '.accordion > .accordion-item .accordion-thumb', function (e){
      $(this).parent('.accordion-item').siblings(".accordion-item").removeClass("is-active").children(".accordion-panel").slideUp();
      $(this).parent('.accordion-item').toggleClass("is-active").children(".accordion-panel").slideToggle("ease-out");
    })
  });


  //new 16.01.24


  if(window.innerWidth > 767){
    $(".aside-right .mail-wrap-block").sticky({
      topSpacing:50
    });
  }

  //new 22.01.24
  var swiperCoach = new Swiper(".coach-slider", {
    spaceBetween: 30,
    pagination: {
      el: ".coach-pagination",
      clickable: true,
    },
  });

  var swiperSay = new Swiper(".say-slider", {
    spaceBetween: 30,
    pagination: {
      el: ".say-pagination",
      clickable: true,
    },
    slidesPerView: 1,
    breakpoints: {
      500: {
        slidesPerView: 2,
        spaceBetween: 25,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 32,
      },

    },
  });

  /*02-02-24*/
  $(document).on('click', '.top-line .lang-wrap>a', function (e) {
    e.preventDefault();
    $(this).toggleClass('is-open');
    if($(this).hasClass('is-open')){
      $(this).closest('.lang-wrap').find('ul').slideDown()
    }else{
      $(this).closest('.lang-wrap').find('ul').slideUp()
    }
  });

  //22-02-24

  //TIMER
  simplyCountdown('.timer', {
    year: parseInt(php_vars_script.web_year), // required
    month: parseInt(php_vars_script.web_month), // required
    day: parseInt(php_vars_script.web_day), // required
    hours: parseInt(php_vars_script.web_hour), // Default is 0 [0-23] integer
    minutes: parseInt(php_vars_script.web_minute), // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
      days: { singular: 'Day', plural: 'Days' },
      hours: { singular: 'Hour', plural: 'Hours' },
      minutes: { singular: 'Minute', plural: 'Minutes' },
      seconds: { singular: 'second', plural: 'seconds' }
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: false, //Use UTC or not - default : false
    onEnd: function() { return; }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: false
  });

  $(document).on('click', '.read-more', function (e){
    e.preventDefault();
    $(this).hide();
    $('.banner-webinar .text-wrap p').slideDown();
  });

  $(document).on('click', '.mob-read', function (e){
    e.preventDefault();
    $(this).hide();
    $(this).closest('.item').removeClass('item-hide-mob');
  });

});