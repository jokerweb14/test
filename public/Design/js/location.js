   initAutocomplete();
        function initAutocomplete() {
            var myLatlng = { lat: 31.3582019, lng: 48.689245099999994 };
            var inputvalue = $("input.mapLocation").val();
            if (inputvalue != "") {
                var s = inputvalue.replace("(", "").replace(")", "").replace('"', "").replace().split(",");
                myLatlng = new google.maps.LatLng(s[0],s[1]);
            }
            

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatlng
            });
            //marker
            var marker = new google.maps.Marker({
               
                map: map,
                title: 'محل نمایشگاه',
                position: myLatlng

            });

            //google.maps.event.addListener(marker, 'dragend', function (event) {
            //    setLatLng(event.latLng);
                
            //});
            google.maps.event.addListener(marker, 'click', function (event) {
                setLatLng(event.latLng);
            });
            google.maps.event.addListener(map, 'click', function (event) {
                setLatLng(event.latLng);
            });

            google.maps.event.addListener(map, 'drag', function (event) {
                setLatLng(this.getCenter()); 
               
            });

            function setLatLng(latLng) {
                $("input.mapLocation").val(latLng);
                marker.setPosition(latLng);
            //    geocodePosition(marker.getPosition());
                $(".mapLocation").valid();
                
            }
            function geocodePosition(pos) {
                var geocoder = new google.maps.Geocoder;
                var address = "";
                
                geocoder.geocode({
                    latLng: pos
                },
                    function (results) {
                        if (results && results.length > 0) {
                           
                            address = address + "" + results[0].address_components[2].short_name;
                            address = address + "," + results[0].address_components[1].short_name;
                            address = address + "," + results[0].address_components[0].short_name;
                            //for (var i = results[0].address_components.length; i =>0 ; i--) {
                            //    for (var b = 0; b < results[0].address_components[i].types.length; b++) {
                            //        if (results[0].address_components[i].types[b] == "route") {
                            //            address = address + "" + results[0].address_components[i].short_name;

                            //        }
                            //        if (results[0].address_components[i].types[b] == "locality") {
                            //            address = address + ","+results[0].address_components[i].short_name;

                            //        }
                                
                                  

                            //    }
                            //}
                            $("input.mapLocation").val(address);
                            
                       
                    } 
                });
            }
          



            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

          
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    }
                    else {
                        bounds.extend(place.geometry.location);
                    }
                    // now let's move the marker
                    marker.setPosition(place.geometry.location);
                    setLatLng(place.geometry.location)
                });
                map.fitBounds(bounds); 
            });


           
        }