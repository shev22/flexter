


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

$('#exampleSlider').multislider({
  duration:10000,
  continuous:true
});


$('#exampleSlider2').multislider({
  interval:6000,
  slideAll:true
});

$('#exampleSlider1').multislider({

  interval:7000,
  slideAll:true
});



$('#movie-show-media ').multislider({

  duration:10000,
  continuous:true
});


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




});








