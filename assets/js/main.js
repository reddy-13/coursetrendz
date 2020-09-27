// document.addEventListener("DOMContentLoaded", () => {
//   // Get all "navbar-burger" elements
//   const $navbarBurgers = Array.prototype.slice.call(
//     document.querySelectorAll(".navbar-burger"),
//     0
//   );

//   // Check if there are any navbar burgers
//   if ($navbarBurgers.length > 0) {
//     // Add a click event on each of them
//     $navbarBurgers.forEach((el) => {
//       el.addEventListener("click", () => {
//         // Get the target from the "data-target" attribute
//         const target = el.dataset.target;
//         const $target = document.getElementById(target);

//         // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
//         el.classList.toggle("is-active");
//         $target.classList.toggle("is-active");
//       });
//     });
//   }
// });

$(document).ready(function () {
  // Check for click events on the navbar burger icon
  $(".navbar-burger").click(function () {
    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    $(".navbar-burger").toggleClass("is-active");
    $(".navbar-menu").toggleClass("is-active");
  });
});

$(document).ready(function () {
  // Check for click events on the navbar burger icon
  $("#signIn").click(function () {
    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    $(".modal").toggleClass("is-active is-clipped");
  });
  $("#close").click(function () {
    $(".modal").toggleClass("is-active is-clipped");
  });

  $("#cancel").click(function () {
    $(".modal").toggleClass("is-active is-clipped");
  });
});

// sign up & login js

$(document).ready(function () {
  $.ajax({
    url: "action.php",
    method: "POST",
    data: "&action=checkCookie",
  }).done(function (result) {
    var data = JSON.parse(result);
    $("#email").val(data.email);
    $("#pwd").val(data.pass);
  });

  $("#fname").keyup(function () {
    var regexp = /^[A-Za-z ]+$/;
    if (regexp.test($("#fname").val())) {
      $("#fname").closest(".form-group").removeClass("has-error");
      $("#fname").closest(".form-group").addClass("has-success");
    } else {
      $("#fname").closest(".form-group").addClass("has-error");
    }
  });

  $("#mobno").keyup(function () {
    var regexp = /^[0-9]{10}$/;
    if (regexp.test($("#mobno").val())) {
      $("#mobno").closest(".form-group").removeClass("has-error");
      $("#mobno").closest(".form-group").addClass("has-success");
    } else {
      $("#mobno").closest(".form-group").addClass("has-error");
    }
  });

  $("#uemail").keyup(function () {
    var regexp = /^[a-zA-z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
    if (regexp.test($("#uemail").val())) {
      $("#uemail").closest(".form-group").removeClass("has-error");
      $("#uemail").closest(".form-group").addClass("has-success");
    } else {
      $("#uemail").closest(".form-group").addClass("has-error");
    }
  });

  $("#passwd").keyup(function () {
    var regexp = /^[a-zA-Z0-9]{6,50}$/;
    if (regexp.test($("#passwd").val())) {
      $("#passwd").closest(".form-group").removeClass("has-error");
      $("#passwd").closest(".form-group").addClass("has-success");
    } else {
      $("#passwd").closest(".form-group").addClass("has-error");
    }
  });

  $("#cpasswd").keyup(function () {
    var regexp = /^[a-zA-Z0-9]{6,50}$/;
    if (regexp.test($("#cpasswd").val())) {
      if ($("#cpasswd").val() == $("#passwd").val()) {
        $("#cpasswd").closest(".form-group").removeClass("has-error");
        $("#cpasswd").closest(".form-group").addClass("has-success");
      } else {
        $("#cpasswd").closest(".form-group").addClass("has-error");
      }
    } else {
      $("#cpasswd").closest(".form-group").addClass("has-error");
    }
  });

  $("#register").click(function (event) {
    event.preventDefault();
    var formData = $("#signup-form").serialize();

    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData + "&action=register",
    }).done(function (result) {
      $(".alert").show();

      $("#result").html(result);
    });
  });

  $("#email").keyup(function () {
    var regexp = /^[a-zA-Z0-9._]+@[a-zA-Z0-9._]+\.[a-zA-Z]{2,4}$/;
    if (regexp.test($("#email").val())) {
      $("#email").closest(".form-group").removeClass("has-error");
      $("#email").closest(".form-group").addClass("has-success");
    } else {
      $("#email").closest(".form-group").addClass("has-error");
    }
  });

  $("#pwd").keyup(function () {
    var regexp = /^[a-zA-Z0-9]{6,50}$/;
    if (regexp.test($("#passwd").val())) {
      $("#pwd").closest(".form-group").removeClass("has-error");
      $("#pwd").closest(".form-group").addClass("has-success");
    } else {
      $("#pwd").closest(".form-group").addClass("has-error");
    }
  });

  $("#login").click(function (event) {
    event.preventDefault();
    var formData = $("#sign-in-frm").serialize();
    console.log(formData);
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData + "&action=login",
    }).done(function (result) {
      console.log(result);

      var data = JSON.parse(result);
      $(".alert").show();
      if (data.status == 0) {
        $("#result").html(data.msg);
      } else {
        document.location = "welcome.php";
      }
    });
  });

  $("#reset").click(function (event) {
    event.preventDefault();
    var formData = $("#forgot-pass-frm").serialize();
    console.log(formData);
    $("#loader").show();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: formData + "&action=resetPass",
    }).done(function (result) {
      console.log(result);
      $("#loader").hide();
      var data = JSON.parse(result);
      $(".alert").show();
      if (data.status == 0) {
        $("#result").html(data.msg);
      } else {
        //                document.location = "welcome.php";
        $("#result").html(data.msg);
      }
    });
  });
});
