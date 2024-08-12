// search-box open close js code
let navbar = document.querySelector(".navbar");
let searchBox = document.querySelector(".search-box .bx-search");
// let searchBoxCancel = document.querySelector(".search-box .bx-x");

searchBox.addEventListener("click", ()=>{
  navbar.classList.toggle("showInput");
  if(navbar.classList.contains("showInput")){
    searchBox.classList.replace("bx-search" ,"bx-x");
  }else {
    searchBox.classList.replace("bx-x" ,"bx-search");
  }
});

// sidebar open close js code
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}


// sidebar submenu open close js code

// let jsArrow = document.querySelector(".js-arrow",);
// jsArrow.onclick = function() {
//  navLinks.classList.toggle("show3");

// }
let submenu = document.querySelector(".submenu");
submenu.onclick = function() {
 navLinks.classList.toggle("show3");

}
let footerlink = document.querySelector(".sub-footer");
let jsbotton = document.querySelector(".js-botton");
jsbotton.onclick = function() {
  footerlink.classList.toggle("sub-footer");
  jsbotton.style.color="white";

}


