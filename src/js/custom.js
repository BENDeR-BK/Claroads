var chThemeModule;

(function($) {
	chThemeModule = (function() {

		var elements = {
			$html : $('html'),
			$document : $( document ),
		}
	

		/**
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 * Validate inputs
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 */
		function validateInputs() {
			$('input[name="phone"], input[name="your-phone"], input[name="client_phone"]').on('change keyup keydown', function() {
				var myVar = $(this).val();
				var digit = ('' + myVar)[2];

				if (digit == '0') {
					$(this).val(' ');
					$(this).blur().focus();
				}
				$('input[type="submit"]').attr('disabled', 'disabled');

				var re = new RegExp("_$");

				if (!re.test(myVar)) {
					$(this).removeClass('error-phone');
					$('input[type="submit"]').removeAttr('disabled');
					$('button[type="submit"]').removeAttr('disabled').find('.shine-button__el').addClass('animate');
				} else {
					$(this).addClass('error-phone');
				}
			});
		}

		/**
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 * leadGenerator
		 *-------------------------------------------------------------------------------------------------------------------------------------------
		 */
		// Set cookie
		function setCookie(name, value, minutes) {

			var expires = "";

			if (minutes) {
				var date = new Date();
				date.setTime(date.getTime() + minutes * 1000);
				expires = "; expires=" + date.toUTCString();
			}

			document.cookie = name + "=" + (value || "")  + expires + "; path=/";
		}

		// Get cookie
		function readCookie(name) {

			var nameEQ = name + "=";
			var ca = document.cookie.split(';');

			for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
					if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}

			return null;

		}

		return {
			init: function() {
				this.ready();
				this.customOrderLoad();
				this.customOrderChange();
			},

			customOrderLoad: function(){

				var $customorder = $('.checkout')
				if ($customorder.length) {
					

					$.ajax({
						type:    'POST',
						url: $nm_js.ajaxurl,
						contentType: "application/x-www-form-urlencoded; charset=UTF-8",
						enctype: 'multipart/form-data',
						data: {
							'action': 'ajax_load',
							// 'val': $(this).val()
							
						},
						success: function (result) {
							var res = JSON.parse(result),
								totalVisitors = $('.rangesl'),
								trafficTypePrice = $('.trafficbox .totaltext span'),
								trType1 = $('#trtype1'),
								trType2 = $('#trtype2'),
								totalVisitorsPrice = $('.visitorsbox .totaltext span'),
								visitors = $('#billing_wooccm16'),
								totalChek = $('.totalChek'),
								formTotalPrice = $('.order-bottsect .title span');


							console.log(res); 

							$('#castomPrice').val(res.totalVisitorsPrice)
							totalVisitors.val(res.rangesl)
							trType1.attr("data-valu" ,res.trtype1)
							trType2.attr("data-valu" ,res.trtype2)
							trafficTypePrice.text(res.trtype1)
							totalVisitorsPrice.text(res.totalVisitorsPrice)
							formTotalPrice.text(res.totalVisitorsPrice)
							visitors.val(res.rangesl)
							totalChek.text(res.totalVisitorsPrice)
							
						},
						error:   function(error) {
							console.log(error); // For testing (to be removed)
						}
					})
					
				}
				
			},

			customOrderChange: function(){
				$('.checkout ').on('submit', function(){
					console.log($('.checkout ').serializeArray());
				})

				var $customorder = $('.checkout')
				if ($customorder.length) {
					$('input[name="billing_wooccm14"], .rangesl').change(function () {
						var totalVisitors = $('.rangesl'),
							trafficTypeVal = $('input[name="billing_wooccm14"]:checked').data('valu')
							$('.trafficbox .totaltext span').text(Number(trafficTypeVal).toFixed(2))

							console.log(trafficTypeVal);

						$.ajax({
							type:    'POST',
							url: $nm_js.ajaxurl,
							contentType: "application/x-www-form-urlencoded; charset=UTF-8",
							enctype: 'multipart/form-data',
							data: {
								'action': 'ajax_calc',
								'rangesl': totalVisitors.val(),
								'trafficTypeVal': trafficTypeVal

							},
							success: function (result) {
								var result = JSON.parse(result),
									totalVisitorsPrice = $('.visitorsbox .totaltext span'),
									totalChek = $('.totalChek'),
									visitors = $('#billing_wooccm16'),
									formTotalPrice = $('.order-bottsect .title span');
	
	
								console.log(result); 
	
								$('#castomPrice').val(result.resCalc)
								
								totalVisitorsPrice.text(result.resCalc)
								formTotalPrice.text(result.resCalc)
								visitors.val(result.rangesl)
								totalChek.text(result.resCalc)
							},
							error:   function(error) {
								console.log(error); // For testing (to be removed)
							}
						})
			
					});
				
					
					
				}
				
			},


			/**
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 * 1. Cursor
			 *-------------------------------------------------------------------------------------------------------------------------------------------
			 */
			ready: function() {
				console.log('ready')
				$(".eye").click(function () {
					var input = $(this).parent().find('input');
					if (input.attr("type") == "password") {
						input.attr("type", "text");
					} else {
						input.attr("type", "password");
					}
				});
				$("#acceptcheck").change(function () {
					if ($(this).is(':checked')) {
						console.log('true');

						$('.place_order').prop('disabled', false);
					} else {
						console.log('false');

						$('.place_order').prop('disabled', true);
					}
				});

		
				$('#mix').mixItUp({
				selectors: {
					filter: '.filter-1',
					sort: '.sort-1'
				},
				animation: {
					duration: 700,
					effects: 'fade stagger(100ms)',
					staggerSequence: function(i) {
						return (2*i) - (5*((i/3) - ((1/3) * (i%3))));
					}
					},
				});
				$('.hihebtn').addClass('active')
			},

			
		}
	}());
})(jQuery);

jQuery(document).ready(function () {
    chThemeModule.init();
});

