const allLinks = document.querySelectorAll(".nav__item");
const allDropdowns = document.querySelectorAll(".nav__dropdown");

const displayDropdown = (num) => () => {
  allDropdowns.forEach((element) => {
    if (element.classList.contains(`nav__dropdown--${num}`)) {
      element.classList.toggle("display-flex");
    }
  });
};

allLinks[0].addEventListener("click", displayDropdown("one"));
