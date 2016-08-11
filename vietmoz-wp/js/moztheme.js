var browser_w = jQuery( window ).width();
jQuery(function($) {
	//homeslider
	$('.sslider').slick({
		autoplay: true,
		slide: 'a',
		dots: true,
		autoplaySpeed: 5000,
		speed: 1000,
		infinite: true
	});
	$('.entry-content table').addClass('table table-bordered');
	$('.entry-content table').wrap( "<div class='table-responsive'></div>" );



	var container_w = $('.container').width();
	var initial_top = $( '.lefta' ).css( 'top' );
	$(window).load(function() {
		var nav_offset = $('#main-nav').offset();
		initial_top = nav_offset.top;
		$( '.lefta' ).css( 'top', initial_top);
		$('.righta').css( 'top', initial_top)
	});
	// alert( initial_top );
	if( container_w < browser_w ) {
		var distance = container_w + ( browser_w - container_w )/2 + 20;
		distance = distance + 'px';
		$( '.lefta' ).css({
			right: distance
		});
		$( '.righta' ).css({
			left: distance
		});
		$( window ).scroll(function(event) {
			if ( $(window).scrollTop() > parseInt( initial_top ) ) {
				$( '.lefta' ).css({
					top: 0
				});
				$( '.righta' ).css({
					top: 0
				});
			}
			else {
				$( '.lefta' ).css({
					top: initial_top
				});
				$( '.righta' ).css({
					top: initial_top
				});
			}
		});
	}
	$(window).resize(function() {
		var container_w = $('.container').width();
		var browser_w = $( window ).width();
		var initial_top = $( '.lefta' ).css( 'top' );
		// alert( initial_top );
		if( container_w < browser_w ) {
			var distance = container_w + ( browser_w - container_w )/2 + 20;
			distance = distance + 'px';
			$( '.lefta' ).css({
				right: distance
			});
			$( '.righta' ).css({
				left: distance
			});
			$( window ).scroll(function(event) {
				if ( $(window).scrollTop() > parseInt( initial_top ) ) {
					$( '.lefta' ).css({
						top: 0
					});
					$( '.righta' ).css({
						top: 0
					});
				}
				else {
					$( '.lefta' ).css({
						top: initial_top
					});
					$( '.righta' ).css({
						top: initial_top
					});
				}
			});
		}
	});

//dropdown on hover + active parent link bootstrap
	if( browser_w > 960 ) {
		$('.navbar-nav .dropdown').hover(function() {
		$(this).find('.dropdown-menu').first().stop(true, true).delay(250).show();

		}, function() {
		$(this).find('.dropdown-menu').first().stop(true, true).delay(100).hide();

		});

		$('.navbar-nav .dropdown-toggle').click(function(){
		location.href = this.href;
		});
	}

});

this.imagePreview = function() {
	if( browser_w < 960 ) { return; }
	/* CONFIG */

	var xOffset = 15;
	var yOffset = 20;
	// these 2 variable determine popup's distance from the cursor
	// you might want to adjust to get the right result
	var Mx = jQuery(document).width();
	var My = jQuery(document).height();
	var Wh = jQuery(window).height();

	/* END CONFIG */
	var callback = function(event) {
		var screenTop = jQuery(document).scrollTop();
		var $img = jQuery("#preview");

		// top-right corner coords' offset
		var trc_x = xOffset + $img.width();
		var trc_y = yOffset + $img.height();

		if(trc_x + event.pageX > Mx) {
			$img.css('right', (Mx - event.pageX) + "px");
		} else {
			$img.css('left', (event.pageX + xOffset)+ 'px');
		}

		if((trc_y + event.pageY - screenTop) > Wh ) {
			$img.css('top', (event.pageY - trc_y) + "px");
		} else {
			$img.css('top', (event.pageY + yOffset)+ 'px');
		}

		//trc_x = Math.min(trc_x + event.pageX, Mx);
		//trc_y = Math.min(trc_y + event.pageY, My);

		//$img
		//	.css("top", (trc_y - $img.height()) + "px")
		//	.css("left", (trc_x - $img.width())+ "px");
	};

	jQuery("li.has-post-thumbnail > a img").hover(function(e){
			Mx = jQuery(document).width();
			My = jQuery(document).height();

			//this.t = this.title;
			//this.title = "";
			//var c = (this.t != "") ? "<br/>" + this.t : "";
			var imgUrl = jQuery(this).parent().find('.img-preview > img');
			imgUrl = imgUrl[0].src;
			jQuery("body").append("<p id='preview'><img src='"+ imgUrl +"' /></p>");
			callback(e);
			jQuery("#preview").fadeIn("fast");
		},
		function(){
			//this.title = this.t;
			jQuery("#preview").remove();
		}
		)
		.mousemove(callback);
};
