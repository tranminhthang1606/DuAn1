//---------------scroll Menu--------------//

window.onscroll = function () { scrollFunction() };
document.getElementById("nav").style.backgroundColor = "#fff";
function scrollFunction() {
  if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {


    document.getElementById("nav").style.top = "0"
    document.getElementById("nav").style.padding = "16px 0px 0px 0px"
    document.getElementById("nav").style.boxShadow = "0px 2px 10px gray"
  } else {

    document.getElementById("nav").style.top = "40px"
    document.getElementById("nav").style.padding = "16px 0px 16px 0px"
    document.getElementById("nav").style.boxShadow = "0px 2px 10px gray"

  }
}

document.getElementById('appp').style.display = "none"
function showProduct() {
  var x = document.getElementById('appp');
  window.scrollTo(0,0)
  if (x.style.display == "block") {
    x.style.display = "none"
    x.style.transition=".6s";
    x.style.transform(screenX)="0"
  } else {
    x.style.display = "block"
    x.style.zIndex="100"
    x.style.transform(screenX)="100%"  
  }
}

//----------------dark mode----------------//

const app = document.querySelector("#app");
const toggggle = document.querySelector(".toggle");
toggggle.addEventListener("click", () => {
  app.classList.toggle("dark")
    // đổi icon snag ban đêm
    ? (toggggle.firstElementChild.className = "far fa-moon") : (toggggle.firstElementChild.className = "bx bx-sun")
})