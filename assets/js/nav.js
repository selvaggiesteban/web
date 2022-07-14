// The event adds the class 'navbar-active' when scroll //
const body = document.querySelector("body"),
  nav = document.querySelector("nav");
window.addEventListener("scroll", function (e) {
  const lastPosition = window.scrollY;
  if (lastPosition > 100) {
    nav.classList.add("navbar-active");
  } else if (nav.classList.contains("navbar-active")) {
    nav.classList.remove("navbar-active");
  } else {
    nav.classList.remove("navbar-active");
  }
});
