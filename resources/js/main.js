

$(document).ready(function () {


  // TOGGLE
  const ball = document.querySelector(".toggle-ball");
  const items = document.querySelectorAll(
    ".container,.menubar, .credits, .movie-list-title,.navbar-container,.auth,.sidebar,.left-menu-icon,.toggle"
  );

  ball.addEventListener("click", () => {
    items.forEach((item) => {
      item.classList.toggle("active");
    });
     ball.classList.toggle("active");

     axios.post('/night-mode', {
     
  })

  });






/**
 * category selector
 */


$(".home-section-controls button").on("click", function(){

  $(".home-section-controls button").removeClass("active-filter");
  $(this).addClass("active-filter");

});





$('.checkbox-filter').on( 'click', 'input', function() {
  // $(".card ").fadeOut('fast');
  // $(".checkbox-filter button").removeClass("active-filter");
  // $(".checkbox-filter").addClass("active-filter");

});









/**
 *   top rated, search page, watchlist
 */

$(".search-panel button").on("click", function(){
  $(".search-panel button").removeClass("active-filter");
  $(this).addClass("active-filter");

 });


$("#movies ").click(function () {


  $(".movie").show(400);
  $(".person").hide(100);
  $(".tv").hide(100);
});

$("#tv").click(function () {
  $(".tv").show(400);
  $(".movie").hide(100);
  $(".person").hide(100);
});

$("#actors").click(function () {

  $(".person").show(400);
  $(".movie").hide(100);
  $(".tv").hide(100);
});
/**
 * 
 */









































  //side men bar
  $(".menu-dropdown").click(function () {
    event.stopPropagation();
    $('.menubar').slideToggle('fast').css({ display: 'flex' });
   


  });


  $(document).on('click', function (e) {
    if ($(e.target).closest(".menubar").length === 0) {
      $(".menubar").slideUp('fast');
     
    }
  });



  $(".login").click(function () {
    event.stopPropagation();
    $(".login-form-container ").slideToggle('fast');
    $(".register-form-container").slideUp('fast');
    $(".recover-form-container").slideUp('fast');

  });

  // $(document).on('click', function (e) {
  //   if ($(e.target).closest(".login-form-container ").length === 0) {
  //     $(".login-form-container ").slideUp('fast');
  //   }
  // });

  $(".register").click(function () {
    event.stopPropagation();
    $(".register-form-container").slideToggle('fast');
    $(".login-form-container ").slideUp('fast');
    $(".recover-form-container").slideUp('fast');
  });


  // $(document).on('click', function (e) {
  //   if ($(e.target).closest(".register-form-container").length === 0) {
  //     $(".register-form-container").slideUp('fast');
  //   }
  // });


  $(".recover").click(function () {
    event.stopPropagation();
    $(".login-form-container ").slideUp('fast');
    $(".recover-form-container").slideDown('fast');
 
  });


  // $(document).on('click', function (e) {
  //   if ($(e.target).closest(".recover-form-container").length === 0) {
  //     $(".recover-form-container").slideUp('fast');
  //   }
  // });


  $(".profile").click(function () {
    event.stopPropagation();
    $(".profile-dropdown-container ").slideToggle('fast');
  
  });

  $(document).on('click', function (e) {
    if ($(e.target).closest(".login-form-container, .register-form-container, .profile-dropdown-container, .filter-content-language, .filter-content-rating, .filter-content-genre, .filter-content-year, .recover-form-container,.search-results").length === 0) {
      $(".login-form-container, .register-form-container, .filter-content-rating, .filter-content-language, .profile-dropdown-container, .filter-content-genre, .filter-content-year, .recover-form-container, .search-results").slideUp('fast');
    }
  });








  $("#home-tv-section").click(function () {
    event.stopPropagation();
    $(".movie-section ").hide(500);
    $(".tv-section ").show(500).css({ opacity: 1 });

  
  });

  $("#home-movie-section").click(function () {
    event.stopPropagation();
    $(".tv-section ").hide(500);
    $(".movie-section ").show(500);
  
  });































  /****
   * Movie filter secrtion
   * 1.10.2023
   */

  $(".genre-filter").click(function () {
    event.stopPropagation();

    $(".filter-content-rating").slideUp('fast')
    $(".filter-content-genre").slideToggle('fast');
    $(".filter-content-year").slideUp('fast')
    $(".filter-content-language").slideUp('fast');
  });

  $(".year-filter").click(function () {
    event.stopPropagation();
    $(".filter-content-genre").slideUp('fast')
    $(".filter-content-year").slideToggle('fast');
    $(".filter-content-language").slideUp('fast');
    $(".filter-content-rating").slideUp('fast')
  });

  $(".language-filter").click(function () {
    event.stopPropagation();
    $(".filter-content-genre").slideUp('fast')
    $(".filter-content-year").slideUp('fast')
    $(".filter-content-rating").slideUp('fast')
    $(".filter-content-language").slideToggle('fast');
  });


  $(".rating-filter").click(function () {
    event.stopPropagation();
    $(".filter-content-genre").slideUp('fast')
    $(".filter-content-year").slideUp('fast')
    $(".filter-content-language").slideUp('fast');
    $(".filter-content-rating").slideToggle('fast');
  });




























  $(".stream").click(function () {

  
    $(".movie_card").fadeOut('fast');
    $(".modal-frame").slideToggle();
    $(".stream").hide();
  });

  $(".modal-close").click(function () {
 
    $(".modal-frame").slideUp();
    $(".movie_card").slideToggle();
    $(".stream").show();

  });


















});








