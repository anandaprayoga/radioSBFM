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

// scroll event
// JavaScript to handle scrolling and dragging
const scrollableRow = document.querySelector('.scrollable-row');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

// Scroll by clicking arrows
rightArrow.addEventListener('click', () => {
    scrollableRow.scrollBy({ left: 300, behavior: 'smooth' });
});

leftArrow.addEventListener('click', () => {
    scrollableRow.scrollBy({ left: -300, behavior: 'smooth' });
});

// Enable drag-to-scroll
let isDown = false;
let startX;
let scrollLeft;

scrollableRow.addEventListener('mousedown', (e) => {
    isDown = true;
    scrollableRow.classList.add('active');
    startX = e.pageX - scrollableRow.offsetLeft;
    scrollLeft = scrollableRow.scrollLeft;
});

scrollableRow.addEventListener('mouseleave', () => {
    isDown = false;
    scrollableRow.classList.remove('active');
});

scrollableRow.addEventListener('mouseup', () => {
    isDown = false;
    scrollableRow.classList.remove('active');
});

scrollableRow.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - scrollableRow.offsetLeft;
    const walk = (x - startX) * 1.5; // Scroll speed
    scrollableRow.scrollLeft = scrollLeft - walk;
});

// modal event
document.addEventListener("DOMContentLoaded", function() {
  const triggerModalElements = document.querySelectorAll(".triggerModal");
  const exampleModal = new bootstrap.Modal(document.getElementById("exampleModal"), {
      backdrop: true,
      keyboard: true
  });

  // Show modal when any card is clicked
  triggerModalElements.forEach(function(triggerModal) {
      triggerModal.addEventListener("click", function() {
          exampleModal.show();
      });
  });

  // Close modal when "X" is clicked
  document.getElementById("closeModal").addEventListener("click", function() {
      exampleModal.hide();
  });
});

// const myModal = document.getElementById('myModal')
// const myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', () => {
//   myInput.focus()
// })


