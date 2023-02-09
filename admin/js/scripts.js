/*!
 * Start Bootstrap - SB Admin v6.0.1 (https://startbootstrap.com/templates/sb-admin)
 * Copyright 2013-2020 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
(function ($) {
  "use strict";

  // Add active state to sidbar nav links
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function () {
    if (this.href === path) {
      $(this).addClass("active");
    }
  });

  // Toggle the side navigation
  $("#sidebarToggle").on("click", function (e) {
    e.preventDefault();
    $("body").toggleClass("sb-sidenav-toggled");
  });
})(jQuery);


// add recipe funciton created by Moti sultan Nur
var field = document.getElementById("more_field");
function delete_field() {
  var delete_field = document.getElementById("more_field").lastElementChild;
  document.getElementById("more_field").removeChild(delete_field);
}


function more_field() {
  var element = document.getElementById("more_field");
  var numberOfChildren = element.getElementsByTagName("input"). length + 1;
  var more_field =
  "<input type='text' name='preparation' class='form-control' placeholder='Étape " +
    numberOfChildren + "'>' ";
  document.getElementById("more_field").innerHTML += more_field;
}
