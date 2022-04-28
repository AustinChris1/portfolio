//toggle password
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    
    // toggle the icon
    this.classList.toggle("bi-eye");
});

      // intl phone number
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {
          separateDialCode: true,
          customPlaceholder: function (
              selectedCountryPlaceholder,
              selectedCountryData
          ) {
              return "e.g. " + selectedCountryPlaceholder;
          },
      });

//loading animation
setTimeout(function() {
  $("#loading").hide();
}, 3100);
setTimeout(function() {
  $(".content").show();
}, 3000);


