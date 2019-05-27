var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var checkPassword = false

// When the user clicks on the password field, show the message box


// When the user clicks outside of the password field, hide the message box

// When the user starts to type something inside the password field
myInput.onkeyup = function () {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  var upperCaseLetters = /[A-Z]/g;
  var numbers = /[0-9]/g;
  if (myInput.value.match(numbers) && myInput.value.match(upperCaseLetters) && myInput.value.match(lowerCaseLetters)) {
    $("#validate").text("**Valid**").css("color", "green")
    checkPassword = true
  } else {
    $("#validate").text("**Invalid**").css("color", "red")
    checkPassword = false
  }

};

// var password = document.getElementById("psw"),
//   confirm_password = document.getElementById("confirm_password");

// function validatePassword() {
//   if (password.value != confirm_password.value) {
//     confirm_password.setCustomValidity("Passwords Don't Match");
//   } else {
//     window.location.href = "profile.html";
//   }
// }

// password.onchange = validatePassword;
// confirm_password.onkeyup = validatePassword;

$(function () {
  $("#btnSubmit").click(function () {
    if (checkPassword == true) {
      var password = $("#psw").val();
      var confirmPassword = $("#confirm_password").val();
      if (password != confirmPassword) {

        $("#repeat").text("Password do not match").css("color", "red")
        return false;
      } else {

        return true;
      }
    } else {
      alert("Password do not fulfill requirement!")
    }
  });
});

