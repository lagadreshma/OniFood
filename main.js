// JavaScript for hide or show Menu Items
let nav = document.getElementById("navlinks");

function hide(){
    nav.style.right = "0";
}

function show(){
    nav.style.right = "-250px";
}

// for swiper js - vanilla js - core js

// Swiperjs JavaScript for advertisements
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 30,
  autoplay : {
      delay: 3000,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});





//  Swiperjs JavaScript for Customers Review

// var swiper = new Swiper(".Swiper", {
//   spaceBetween: 30,
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true,
//   },
//   navigation: {
//       nextEl: ".swiper-button-next",
//       prevEl: ".swiper-button-prev",
//     },
// });


