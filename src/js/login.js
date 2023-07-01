document.querySelector(".login-form").addEventListener("submit", function(event) {
  event.preventDefault();

  const username = document.getElementById("username").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const passwordVerify = document.getElementById("password-verify").value;

  const isUsernameTaken = false;
  const isEmailTaken = false;

  if (isUsernameTaken) {
    document.getElementById("usernameError").textContent = "Username is already taken.";
  } else {
    document.getElementById("usernameError").textContent = "";
  }

  if (isEmailTaken) {
    document.getElementById("emailError").textContent = "Email is already taken.";
  } else {
    document.getElementById("emailError").textContent = "";
  }

  if (password !== passwordVerify) {
    document.getElementById("passwordError").textContent = "Passwords do not match.";
  } else {
    document.getElementById("passwordError").textContent = "";
  }

  if (!isUsernameTaken && !isEmailTaken && password === passwordVerify) {
    this.submit();
  }
});
