document.querySelectorAll('nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });



// CV dropdown
document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("cvDropdownBtn");
  const menu = document.getElementById("cvDropdownMenu");

  if (!btn || !menu) return;

  btn.addEventListener("click", function (e) {
    e.stopPropagation(); // prevent click from bubbling to document
    menu.classList.toggle("show");
  });

  // Close when clicking outside
  document.addEventListener("click", function () {
    menu.classList.remove("show");
  });
});
