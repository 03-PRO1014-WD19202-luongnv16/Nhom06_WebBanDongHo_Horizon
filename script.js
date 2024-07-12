const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        }
    });
});
const hiddenElement = document.querySelectorAll(".hidden");
hiddenElement.forEach((el) => observer.observe(el));
window.addEventListener("scroll",function(){
    var header=document.querySelector(".header-menu");
    header.classList.toggle("sticky", window.scrollY > 0);
});