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

// 
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

/* Created by Tivotal */

let carousel = document.querySelector(".carousel1");
let btns = document.querySelectorAll(".wrapper i");
let carouselChildren = [...carousel.children];
let wrapper = document.querySelector(".wrapper");

//getting card width
let cardWidth = carousel.querySelector(".card1").offsetWidth;
let isDragging = false,
  startX,
  startScrollLeft,
  isAutoPlay = true,
  timeoutId;

// Mendapatkan jumlah kartu yang bisa muat di carousel sekaligus
let cardsPerView = Math.round(carousel.offsetWidth / cardWidth);

// Memastikan tidak menggandakan kartu jika jumlah kartu asli kurang dari atau sama dengan cardsPerView
if (carouselChildren.length > cardsPerView) {
  // Menyalin beberapa kartu terakhir ke awal carousel untuk scrolling tak terbatas
  carouselChildren
    .slice(-cardsPerView)
    .reverse()
    .forEach((card) => {
      carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });

  // Menyalin beberapa kartu pertama ke akhir carousel untuk scrolling tak terbatas
  carouselChildren.slice(0, cardsPerView).forEach((card) => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
  });
} else {
  // Jika jumlah kartu <= cardsPerView, tambahkan kelas untuk menempatkan kartu di tengah
  carousel.classList.add("centered-carousel");
}


btns.forEach((btn) => {
  btn.addEventListener("click", () => {
    //if the clicked button id is left scrolling carousel towards left by card width else towards right by card width
    carousel.scrollLeft += btn.id == "left" ? -cardWidth : cardWidth;
  });
});

let dragStart = (e) => {
  isDragging = true;

  carousel.classList.add("dragging");

  //recording initial cursor and scroll position
  startX = e.pageX;
  startScrollLeft = carousel.scrollLeft;
};

let dragging = (e) => {
  //returning here if the isDragging value is false
  if (!isDragging) return;

  //scrolling carousel according to mouse cursor
  carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
};

let dragStop = () => {
  isDragging = false;

  carousel.classList.remove("dragging");
};

let infiniteScroll = () => {
  //if the carousel is at begining, scroll to end
  //else carousel at end , scroll to beginning
  if (carousel.scrollLeft === 0) {
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.scrollWidth - 2 * carousel.offsetWidth;
    carousel.classList.remove("no-transition");
  } else if (
    Math.ceil(carousel.scrollLeft) ===
    carousel.scrollWidth - carousel.offsetWidth
  ) {
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");
  }

  //clearing timeout & starting auto play if the mouse is not hovering the carousel
  clearTimeout(timeoutId);
  if (!wrapper.matches(":hover")) autoPlay();
};

let autoPlay = () => {
  //if the device is not mobile or tab, enabling auto play
  if (window.innerWidth < 800 || !isAutoPlay) return; //returning if the device is not desktop & isAutoPlay is false

  //autoplaying the carousel after every 2500 ms
  timeoutId = setTimeout(() => {
    carousel.scrollLeft += cardWidth;
  }, 2500);
};

autoPlay();

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);

//auto play will be active only when there is no hover on carousel
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);

// const myModal = document.getElementById('myModal')
// const myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', () => {
//   myInput.focus()
// })


