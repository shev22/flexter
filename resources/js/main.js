


// const arrowsRight = document.querySelectorAll(".arrow-right");
// const arrowsLeft = document.querySelectorAll(".arrow-left");
// const movieLists = document.querySelectorAll(".movie-list");

// arrowsRight.forEach((arrow, i) => {
//   const itemNumber = movieLists[i].querySelectorAll("img").length;
//   let clickCounter = 0;
//   arrow.addEventListener("click", () => {
//     const ratio = Math.floor(window.innerWidth / 270);
//     clickCounter++;
//     if (itemNumber - (4 + clickCounter) + (4 - ratio) >= 0) {
//       movieLists[i].style.transform = `translateX(${
//         movieLists[i].computedStyleMap().get("transform")[0].x.value - 600
//       }px)`;
//     } else {
//       movieLists[i].style.transform = "translateX(0)";
//       clickCounter = 0;
//     }
//   });

//   console.log(Math.floor(window.innerWidth / 270));
// });


// arrowsLeft.forEach((arrow, i) => {
//   const itemNumber = movieLists[i].querySelectorAll("img").length;
//   let clickCounter = 0;
//   arrow.addEventListener("click", () => {
//     const ratio = Math.floor(window.innerWidth / 270);
//     clickCounter++;
//     if (itemNumber - (4 + clickCounter) + (4 - ratio) >= 0) {
//       movieLists[i].style.transform = `translateX(${
//         movieLists[i].computedStyleMap().get("transform")[0].x.value + 600
//       }px)`;
//     } else {
//       movieLists[i].style.transform = "translateX(0)";
//       clickCounter = 0;
//     }
//   });

//   console.log(Math.floor(window.innerWidth / 270));
// });



// $('#ca-container').contentcarousel({
// 	// speed for the sliding animation
// 	sliderSpeed		: 500,
// 	// easing for the sliding animation
// 	sliderEasing	: 'easeOutExpo',
// 	// speed for the item animation (open / close)
// 	itemSpeed		: 500,
// 	// easing for the item animation (open / close)
// 	itemEasing		: 'easeOutExpo',
// 	// number of items to scroll at a time
// 	scroll			: 1	
// });


$(document).ready(function () {


  // TOGGLE
  const ball = document.querySelector(".toggle-ball");
  const items = document.querySelectorAll(
    ".container,.search-results, .credits, .movie-list-title,.navbar-container,.auth,.sidebar,.left-menu-icon,.toggle"
  );

  ball.addEventListener("click", () => {
    items.forEach((item) => {
      item.classList.toggle("active");
    });
    ball.classList.toggle("active");
  });



  //side men bar


  $(".menu-dropdown").click(function () {
    event.stopPropagation();
    $('.menubar').animate({ width: 'toggle' }, 200).css({ display: 'flex' });
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
    if ($(e.target).closest(".login-form-container, .register-form-container, .profile-dropdown-container, .filter-content-genre, .filter-content-year, .recover-form-container").length === 0) {
      $(".login-form-container, .register-form-container, .profile-dropdown-container, .filter-content-genre, .filter-content-year, .recover-form-container").slideUp('fast');
    }
  });
















  /****
   * Movie filter secrtion
   * 1.10.2023
   */

  $(".genre-filter").click(function () {
    event.stopPropagation();
    $(".filter-content-genre").slideToggle('fast');
    $(".filter-content-year").slideUp('fast')
  });

  $(".year-filter").click(function () {
    event.stopPropagation();
    $(".filter-content-genre").slideUp('fast')
    $(".filter-content-year").slideToggle('fast');
  });



  $(".show-nowplaying").click(function () {
    event.stopPropagation();
    $(".nowplaying-movies").slideUp('fast');
    $(".porpular-moviesr").hide('fast')
  });





























  $(".stream").click(function () {


    $(".movie_card").fadeOut(1000);
    $(".modal-frame").fadeIn();
  });

  $(".modal-close").click(function () {
    $(".modal-frame").slideUp();
    $(".movie_card").fadeIn();

  });


















});








