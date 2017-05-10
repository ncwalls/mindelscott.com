(function($){

	var bounds, infoWindow, map, marker, markers, windowScrollPosition = -1;

	// IE Mobile fix
	if ( "-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/) ) {
		var a = document.createElement("style");
		a.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}"));
		document.getElementsByTagName("head")[0].appendChild(a);
	}

	// Add dashboard link for logged-in admin users
	var addDashboardLinkIfNeeded = function(){
		if( 1 == MSWObject.show_dashboard_link ){
			$( '<a href="' + MSWObject.home_url + '/wp-admin" id="msw-dashboard" title="Dashboard" rel="nofollow" target="_blank"><img src="' + MSWObject.site_url + '/wp-admin/images/w-logo-white.png" height="24" width="24" alt="Dashboard"></a>' ).appendTo( 'body' );
		}
	};

	window.createGoogleMap = function(){
		if( document.getElementById( 'gmap' ) ){
			markers = JSON.parse( MSWObject.google_map_data );
			createGoogleMapInit( markers );
		}
	};

	window.createGoogleMapInit = function( markers ){
		var maxZoom = document.getElementById('gmap').getAttribute('data-maxZoom');
		var minZoom = document.getElementById('gmap').getAttribute('data-minZoom');
		var styles = document.getElementById('gmap').getAttribute('data-styles');
		map = new google.maps.Map(document.getElementById('gmap'), {
			center: {lat: -34.397, lng: 150.644},
			disableDoubleClickZoom: true,
			draggable: false,
			mapTypeControl: false,
			scrollwheel: false,
			styles: [
				{
					"featureType": "all",
					"elementType": "geometry",
					"stylers": [
						{
							"color": "#75b94b"
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.text.fill",
					"stylers": [
						{
							"gamma": 0.01
						},
						{
							"lightness": 20
						},
						{
							"color": "#231f20"
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.text.stroke",
					"stylers": [
						{
							"saturation": -31
						},
						{
							"lightness": -33
						},
						{
							"weight": 2
						},
						{
							"gamma": 0.8
						}
					]
				},
				{
					"featureType": "all",
					"elementType": "labels.icon",
					"stylers": [
						{
							"visibility": "off"
						}
					]
				},
				{
					"featureType": "landscape",
					"elementType": "geometry",
					"stylers": [
						{
							"lightness": 30
						},
						{
							"saturation": 30
						}
					]
				},
				{
					"featureType": "poi",
					"elementType": "geometry",
					"stylers": [
						{
							"saturation": 20
						}
					]
				},
				{
					"featureType": "poi.park",
					"elementType": "geometry",
					"stylers": [
						{
							"lightness": 20
						},
						{
							"saturation": -20
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "geometry",
					"stylers": [
						{
							"lightness": 10
						},
						{
							"saturation": -30
						}
					]
				},
				{
					"featureType": "road",
					"elementType": "geometry.stroke",
					"stylers": [
						{
							"saturation": 25
						},
						{
							"lightness": 25
						}
					]
				},
				{
					"featureType": "water",
					"elementType": "all",
					"stylers": [
						{
							"lightness": -20
						}
					]
				}
			],
			minZoom: minZoom || 1,
			maxZoom: maxZoom || 18,
			zoom:14
		});
		bounds = new google.maps.LatLngBounds();
		infoWindow = new google.maps.InfoWindow();
		var infoWindowContent = [];
		for( var i = 0; i < markers.length; i++ ){
			var position = new google.maps.LatLng( markers[i].lat, markers[i].lng );
			//bounds.extend( position );
			marker = new google.maps.Marker({
				icon: markers[i].marker,
				position: position,
				map: map,
				//title: markers[i].address
			});
			//map.fitBounds( bounds );

			infoWindowContent.push( markers[i].address );

			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infoWindow.setContent(infoWindowContent[ i ]);
					infoWindow.open(map, marker);
				};
			})(marker, i));
			/*google.maps.event.addListener(marker, 'closeclick', (function(marker, i) {
				return function() {
					map.fitBounds( bounds );
				};
			})(marker, i));*/
		}
		/*google.maps.event.addDomListener(window, 'resize', function() {
			map.fitBounds( bounds );
		});*/
		map.setCenter(new google.maps.LatLng(markers[0].lat, markers[0].lng));

		google.maps.event.addDomListener(window, 'resize', function() {
			map.setCenter(new google.maps.LatLng(markers[0].lat, markers[0].lng));
		});
	};

	// Toggle "scrolled" body class when site is scrolled or at the top
	var isSiteScrolled = function(){
		var top = window.pageYOffset;
		if( windowScrollPosition != top ){
			windowScrollPosition = top;
			if( 0 < top ){
				$( 'body' ).addClass( 'scrolled' );
			} else {
				$( 'body' ).removeClass( 'scrolled' );
			}
		}
	};

	// Add nav menu functionality if using one of the built-in menus
	var shouldConstructNavMenu = function(){
		if( !$( 'body' ).hasClass( 'nav-custom' ) ){

			// Add sub-menu functionality when clicked.
			// If a link is just a hash, toggle it on click.
			// If it's a legit link, kill it on the first click, but let the second go through.
			$( 'body' ).on( 'click', '.menu-item-has-children > a', function(ev){
				var isTrigger = /#/.test(this.href);
				var thisParent = $( this ).parent();
				if( isTrigger ){
					ev.preventDefault();
					$( thisParent ).toggleClass( 'menu-item-open' );
				} else if( !$( thisParent ).hasClass( 'menu-item-open' ) && $( 'body' ).hasClass( 'nav-open' ) ){
					ev.preventDefault();
					$( thisParent ).toggleClass( 'menu-item-open' );
				}
				$( '.menu-item-has-children' ).not( $( thisParent ) ).removeClass( 'menu-item-open' );
			});

			// If using the built-in offcanvas nav, add the overlay at the end of the document
			if( $( 'body' ).hasClass( 'nav-ocn' ) ){
				$( '<a href="javascript:void(0)" class="nav-toggle" id="ocn-overlay"></a>' ).appendTo( 'body' );
			}

			// Anything with the .nav-toggle class should toggle the menu class.
			$( 'body' ).on( 'click', '.nav-toggle', function(ev){
				ev.preventDefault();
				$( 'body' ).toggleClass( 'nav-open' );
			});
		}
	};
	
	
	var filterDropdown = function(){
		$('.filter-dropdown').on('click', function(e){
			e.stopPropagation();
			$(this).toggleClass('active');
			$('.filter-dropdown').not(this).removeClass('active');
		});

		$(document).on('click.closefilter',':not(.filter-dropdown)', function(){
			$('.filter-dropdown').removeClass('active');
		});
	};

	$(document).ready(function(){
		shouldConstructNavMenu();
		isSiteScrolled();
		createGoogleMap();
		addDashboardLinkIfNeeded();
		filterDropdown();

		optimizedScroll.add( isSiteScrolled );
	});
})(jQuery);