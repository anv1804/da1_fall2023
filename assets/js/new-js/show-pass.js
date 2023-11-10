
function showPassword() {
    var x = document.getElementById("inputPass");
    var show = document.getElementById("icon-show");
    var hide = document.getElementById("icon-hide");

    if (x.type === "password") {
      x.type = "text";
      show.style.display = "block";
      hide.style.display = "none";
    } else {
      x.type = "password";
      show.style.display = "none";
      hide.style.display = "block";

    }
  }