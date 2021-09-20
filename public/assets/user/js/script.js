var base_url = "";

$(".mobile-menu").click(function () {
    $(".mobile-menu-wrapper").slideToggle(200);
});

// Sticky
$(document).ready(function () {
    $("#add_more_button").hide();
    $("#final_step_login").hide();
    $(".otp-verify-cust-login").hide();
    $(".verify_otp_btn").hide();
    $(".registration_otp").hide();
    base_url = getBaseurl();
  //  getallredditdata();
});










var count = 1;
var countEl = document.getElementById("count");

function plus() {
    count++;
    countEl.value = count;
}

function minus() {
    if (count > 1) {
        count--;
        countEl.value = count;
    }
}

// }
var today = new Date(
    new Date().getFullYear(),
    new Date().getMonth(),
    new Date().getDate()
);
$("#datepicker").datepicker({
    uiLibrary: "bootstrap4",
    disableDaysOfWeek: [1, 2, 3, 4, 5, 6],
    minDate: today,
    format: "yyyy-mm-dd",
});

//Main Slider / Banner Carousel





//Main Slider / Banner Carousel
if ($(".banner-carousel").length) {
    $(".banner-carousel").owlCarousel({
        loop: true,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        margin: 0,
        nav: true,
        smartSpeed: 500,
        autoplay: 6000,
        autoplayTimeout: 7000,
        navText: [
            '<span class="icon fa fa-angle-left"></span>',
            '<span class="icon fa fa-angle-right"></span>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            800: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
    });
}

function openNav() {
    document.getElementById("mySidepanelheader").style.left = "0";
    document.getElementById("overlay-sidepanel").className =
        "overlay-sidepanel";
}

function closeNav() {
    document.getElementById("mySidepanelheader").style.left = "-325px";
    document.getElementById("overlay-sidepanel").className =
        "overlay-sidepanel-hide";
}

function openAccount() {
    document.getElementById("panelForm").style.right = "0";
    document.getElementById("overlay-account-form").className =
        "overlay-sidepanel";
}

function closeAccount() {
    document.getElementById("panelForm").style.right = "-350px";
    document.getElementById("overlay-account-form").className =
        "overlay-sidepanel-hide";
}


$(document).mouseup(function (e) {
    var container = $("#searchWrap");
    // if the target of the click isn't the container nor a descendant of the container
    if (!container.is(e.target) && container.has(e.target).length === 0) {
        $(".search-wrap").removeClass("open");
    }
});





$(".js-anchor-link").click(function (e) {
    e.preventDefault();
    var target = $($(this).attr("href"));
    if (target.length) {
        var scrollTo = target.offset().top;
        $("body, html").animate(
            {
                scrollTop: scrollTo + "px",
            },
            800
        );
    }
});

$(document).ready(function () {
    document.getElementById("div1").style.display = "none";

    //parallax scroll
    $(window).on("load scroll", function () {
        var parallaxElement = $(".parallax_scroll"),
            parallaxQuantity = parallaxElement.length;
        window.requestAnimationFrame(function () {
            for (var i = 0; i < parallaxQuantity; i++) {
                var currentElement = parallaxElement.eq(i),
                    windowTop = $(window).scrollTop(),
                    elementTop = currentElement.offset().top,
                    elementHeight = currentElement.height(),
                    viewPortHeight =
                        window.innerHeight * 0.5 - elementHeight * 0.5,
                    scrolled = windowTop - elementTop + viewPortHeight;
                currentElement.css({
                    transform: "translate3d(0," + scrolled * -0.15 + "px, 0)",
                });
            }
        });
    });
});

$(".filter-icon").click(function () {
    $(".mob-filter").slideToggle(200);
});

$(".register-link").click(function () {
    $(".register-form").show();
    $(".login-form").hide();
    $(".email-form").hide();
    $(".forgot-form").hide();
    $(".verification-form").hide();
});

$(".mobile-link").click(function () {
    $(".register-form").hide();
    $(".email-form").hide();
    $(".login-form").show();
    $(".forgot-form").hide();
    $(".verification-form").hide();
});

$(".email-link").click(function () {
    $(".register-form").hide();
    $(".login-form").hide();
    $(".email-form").show();
    $(".forgot-form").hide();
    $(".verification-form").hide();
});

$(".email-link").click(function () {
    $(".register-form").hide();
    $(".login-form").hide();
    $(".email-form").show();
    $(".forgot-form").hide();
    $(".verification-form").hide();
});

$(".forgot-link").click(function () {
    $(".register-form").hide();
    $(".login-form").hide();
    $(".email-form").hide();
    $(".forgot-form").show();
    $(".verification-form").hide();
});









function onlyWeekends(date) {
    var day = date.getDay();
    return [day == 0 || day == 6, ""];
}


function userregister1() {

    var data = {
        _token: $("#token").val(),
        first_name: $("#first_name").val(),
        last_name: $("#last_name").val(),
        email: $("#email").val(),
        female:$("#female").val(),
        male:$("#male").val(),
        dob:$("#date_of_birth").val(),
        password_confirmation:$("#password_confirmation").val(),
        password:$("#password").val(),
        gender:$("#gender").val(),





    };

    $.ajax({
        type: "POST",
        url: base_url + "/user/register",
        data: data,
        success: function (data) {
            var resultSet = JSON.parse(JSON.stringify(data));
            // $('#common-loginvalidation-errors').html('');
            if (resultSet.sucess == true) {
               window.location.reload();
            } else {
                $("#common-loginvalidation-errors1").val('');
                $("#common-loginvalidation-errors1").append(
                    '<div class="alert alert-danger">' +
                        resultSet.mesage +
                        "</div"
                );
            }
            // $('#validation-errors').html('');
            // window.location.reload();
        },
        error: function (xhr) {
            $("#ommon-loginvalidation-errors1").val('');
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("#common-loginvalidation-errors1").append(
                    '<div class="alert alert-danger">' + value + "</div"
                );
            });
        },
    });
}

function login(){
    var data = {
        "_token": $('#token').val(),
        "email" : $("#login_email1").val(),
        "password" : $("#password_login1").val(),
    };
    $.ajax({
              type:"POST",
              url: "/user/login",
              data: data,
              dataType:"json",
              success: function(data){
                var resultSet = JSON.parse(JSON.stringify(data));

                $('#common-loginvalidation-errors').html('');
                if(resultSet.sucess == true){
                  window.location.reload();
                }else{
                   $('#common-loginvalidation-errors').append('<div class="alert alert-danger">'+resultSet.mesage+'</div');
                }
              },
              error: function (xhr) {
                $('#common-loginvalidation-errors').html('');
                 $.each(xhr.responseJSON.errors, function(key,value) {
                   $('#common-loginvalidation-errors').append('<div class="alert alert-danger">'+value+'</div');
               });
          },
      });
}













$(document).on("click", "#common_login_btn", function () {
    login();
});












function common_login() {
    var data = {
        _token: $("#login_token").val(),
        email: $("#common_login_email").val(),
        mobile: $("#common_login_mobile").val(),
    };

    $.ajax({
        type: "POST",
        url: base_url + "/user/login",
        data: data,
        dataType: "json",
        success: function (data) {
            var resultSet = JSON.parse(JSON.stringify(data));
            // $('#common-loginvalidation-errors').html('');
            if (resultSet.sucess == true) {
                $("#type11").val("login");
                $(".register-form").hide();
                $(".email-form").hide();
                $(".login-form").hide();
                $(".forgot-form").hide();
                $(".verification-form").hide();
            } else {
                $("#common-loginvalidation-errors").append(
                    '<div class="alert alert-danger">' +
                        resultSet.mesage +
                        "</div"
                );
            }
        },
        error: function (xhr) {
            $("#common-loginvalidation-errors").html("");
            $.each(xhr.responseJSON.errors, function (key, value) {
                $("#common-loginvalidation-errors").append(
                    '<div class="alert alert-danger">' + value + "</div"
                );
            });
        },
    });
}











$(".js-range-slider").ionRangeSlider({
    min: 100,
    max: 2550,
    from: 550,
});

// health

function show1() {
    document.getElementById("div1").style.display = "none";
}

function show2() {
    document.getElementById("div1").style.display = "block";
}




