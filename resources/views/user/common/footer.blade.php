<footer>
        <div class=""></div>
        <div class="veg1-pattern"></div>

        <div class="container">

            <div class="footer-flex">
                <div class="footer-flex-20">
                    <div class="footer-logo">
                       
                    </div>
                </div>
               
            
              
                <div class="footer-flex-20">
                    <div class="footer-links">
                        <p>Follow Us</p>
                        <ul class="social-links">
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section class="copyright-wrapper">
        <div class="grunge-up-green"></div>
        <div class="container">
            <p><a href=""></a> © Copyright 2021</p>
        </div>
    </section>



    <div class="whatsapp">
        <!-- <a target="_blank" href="https://wa.me/971504464477"><i class="fab fa-whatsapp"></i> Whatsapp US</a> -->
        <a href="https://wa.me/+97100000000" target="_blank">
            <img src="{{asset('assets/user/images/whatsapp.png')}}" alt="fitroad">
        </a>
    </div>


    <script>


        function getBaseurl(){

            return "{{url('')}}";
         }
           </script>



    <script type="text/javascript" src="{{asset('assets/user/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('assets/user/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="https://use.fontawesome.com/64b1d2ba56.js"></script>
    <script src="{{asset('assets/user/js/aos.js')}}"></script>
    <script src="{{asset('assets/user/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/user/js/calendar.js')}}"></script>
    <script src="{{asset('assets/user/js/script.js?v=1.01232')}}"></script>
    <script src="{{asset('assets/user/js/ion.rangeSlider.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/user/js/jquery.rateyo.min.js')}}"></script>



    <script>


             


         function initMap() {
            var latitude = 24.6885946;
            var longitude = 46.6918569;

            var myLatLng = {
                lat: latitude,
                lng: longitude
            };

            var iconBase = 'images/pin.png';


            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 14,

                mapTypeControl: false,
                mapTypeId: 'roadmap'
            });

            //var marker = false; ////Has the restaurant plotted their location marker?
            var marker = new google.maps.Marker({
                draggable: true,
                position: myLatLng,
                map: map,
                icon: iconBase
            });

            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                'latLng': myLatLng
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        $('#txt_location').val(results[0].formatted_address);
                    }
                }
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                geocoder.geocode({
                    'latLng': marker.getPosition()
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#txt_location').val(results[0].formatted_address);
                        }
                    }
                });
            });

            google.maps.event.addListener(map, 'click', function () {
                geocoder.geocode({
                    'latLng': marker.getPosition()
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#txt_location').val(results[0].formatted_address);
                        }
                    }
                });
            });

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function (event) {
                //Get the location that the restaurant clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if (marker === false) {
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });

                } else {
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                var currentLocation = marker.getPosition();
                //Add lat and lng values to a field that we can save.
                document.getElementById('latitude').value = currentLocation.lat(); //latitude
                document.getElementById('longitude').value = currentLocation.lng(); //longitude


            });

            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function (event) {
                var currentLocation = marker.getPosition();
                //Add lat and lng values to a field that we can save.
                document.getElementById('latitude').value = currentLocation.lat(); //latitude
                document.getElementById('longitude').value = currentLocation.lng(); //longitude
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('txt_location');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the restaurant selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                    //alert(place.geometry.location.lat());alert(place.geometry.location.lng());
                    document.getElementById('latitude').value = place.geometry.location
                .lat(); //latitude
                    document.getElementById('longitude').value = place.geometry.location
                .lng(); //longitude

                });

                map.fitBounds(bounds);
            });
        }
        // $('#datepicker').datepicker({
        //     uiLibrary: 'bootstrap4'
        // });
        //Main Slider / Banner Carousel

        if ($('.testimonial-carousel').length) {
            $('.testimonial-carousel').owlCarousel({
                loop: true,
                // animateOut: 'fadeOut',
                // animateIn: 'fadeIn',
                margin: 50,
                nav: true,
                smartSpeed: 500,
                autoplay: 6000,
                autoplayTimeout: 7000,
                dots: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    800: {
                        items: 2
                    },
                    992: {
                        items: 2
                    }
                }
            });
        }


        if ($('.popular-dishes-carousel').length) {
            $('.popular-dishes-carousel').owlCarousel({
                loop: true,
                // animateOut: 'fadeOut',
                // animateIn: 'fadeIn',
                margin: 50,
                nav: true,
                smartSpeed: 500,
                autoplay: 6000,
                autoplayTimeout: 7000,
                dots: true,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    800: {
                        items: 3
                    },
                    992: {
                        items: 3
                    }
                }
            });
        }


        //Main Slider / Banner Carousel
        if ($('.banner-carousel').length) {
            $('.banner-carousel').owlCarousel({
                loop: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                margin: 0,
                nav: true,
                smartSpeed: 500,
                autoplay: 6000,
                autoplayTimeout: 7000,
                navText: ['<span class="icon fa fa-angle-left"></span>',
                    '<span class="icon fa fa-angle-right"></span>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    992: {
                        items: 1
                    }
                }
            });
        }



        function openNav() {
            document.getElementById("mySidepanelheader").style.left = "0";
            document.getElementById("overlay-sidepanel").className = "overlay-sidepanel";

        }

        function closeNav() {
            document.getElementById("mySidepanelheader").style.left = "-325px";
            document.getElementById("overlay-sidepanel").className = "overlay-sidepanel-hide";

        }


        // $('#searchWrap').on('focus', function () {
        //     $(this).parents('.search-wrap').addClass('open');
        // });

        // $('#searchOpen').click(function () {
        //     $('.search-wrap').toggle();
        // });

        $(document).mouseup(function (e) {
            var container = $("#searchWrap");
            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.search-wrap').removeClass('open');
            }
        });


        $(".country-drop .dropdown-item").click(function () {
            $(".btn-list-country.btn:first-child").text($(this).text());
            $(".btn-list-country.btn:first-child").val($(this).text());
        });

        $(".currency-drop .dropdown-item").click(function () {
            $(".btn-list-currency.btn:first-child").text($(this).text());
            $(".btn-list-currency.btn:first-child").val($(this).text());
        });

        /*
            Smooth scroll functionality for anchor links (animates the scroll
            rather than a sudden jump in the page)
        */

        $('.js-anchor-link').click(function (e) {
            e.preventDefault();
            var target = $($(this).attr('href'));
            if (target.length) {
                var scrollTo = target.offset().top;
                $('body, html').animate({
                    scrollTop: scrollTo + 'px'
                }, 800);
            }
        });


        $(document).ready(function () {
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
                            viewPortHeight = window.innerHeight * 0.5 - elementHeight * 0.5,
                            scrolled = windowTop - elementTop + viewPortHeight;
                        currentElement.css({
                            transform: "translate3d(0," + scrolled * -0.15 + "px, 0)"
                        });
                    }
                });
            });

             $('.btnNext').click(function () {
                $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
            });

            $('.btnPrevious').click(function () {
                $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
            });


        });

        $(".js-range-slider").ionRangeSlider({
            min: 100,
            max: 2550,
            from: 550
        });


        $('.filter-icon').click(function () {
            $('.mob-filter').slideToggle(200);

        });

        

    </script>
    @if(isset($show_map) && $show_map)
     <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHFZ49O5XuPD9RR-s0grdzBoV4wAZxJB8&libraries=places&callback=initMap"
        async defer></script>
    @endif
</body>

</html>
