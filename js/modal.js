$(document).on('click', '#modal', example);
function example() {
    el = document.getElementById("example");
    el.style.visibility = el.style.visibility == "visible" ? "hidden" : "visible";
}
