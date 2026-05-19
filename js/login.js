// tombol login
const btnLogin = document.querySelector(".login-box button");
if (btnLogin) {
  btnLogin.addEventListener("mouseover", function () {
    this.style.backgroundColor = "#006400";
    this.style.transform = "scale(1.05)";
    this.style.transition = "0.3s";
  });
  btnLogin.addEventListener("mouseout", function () {
    this.style.backgroundColor = "#4CAF50";
    this.style.transform = "scale(1)";
  });
}

// toggle password
const inputPassword = document.getElementById("inputPassword");
const togglePassword = document.getElementById("togglePassword");

if (inputPassword && togglePassword) {
  togglePassword.addEventListener("click", function () {
    if (inputPassword.type === "password") {
      inputPassword.type = "text";
      togglePassword.innerText = "🙈";
    } else {
      inputPassword.type = "password";
      togglePassword.innerText = "👁️";
    }
  });
}
