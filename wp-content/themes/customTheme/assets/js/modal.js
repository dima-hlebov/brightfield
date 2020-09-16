let popup = document.querySelector(".pop-up");
let btn = document.querySelector("#place_order");
let close = document.querySelector(".pop-up__close");

btn.onclick = function() {
  popup.style.display = "block";
}

close.onclick = function() {
  popup.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == popup) {
    popup.style.display = "none";
  }
}