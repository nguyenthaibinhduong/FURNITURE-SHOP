    <script src="{{ asset('client/js/vendor/jquery-2.2.4.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="{{ asset('client/js/vendor/bootstrap.min.js') }}"></script>
	<script src="{{ asset('client/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('client/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('client/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('client/js/countdown.js') }}"></script>
	<script src="{{ asset('client/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="{{ asset('client/js/gmaps.min.js') }}"></script>
	<script src="{{ asset('client/js/main.js') }}"></script>
	<script>
		$('.ajaxSearch').keyup(function(){
			var text = $(this).val();
			var html ='';
			var urlImage='';
			var urlPro='';
			$.ajax({
				url: "{{ url('/search-product') }}"+'/'+text,
				type: 'GET',
				success: function(res){
					for(var pro of res){
				urlImage="{{ url('/image/product') }}"+'/'+pro.image;
				urlPro="{{ url('/product') }}"+'/'+pro.id;
				html+='<hr>';
				html+='<div class="row">';
                html+='<div class="col-1 d-flex">';
                    html+='<img width="50" height="50" src="'+urlImage+'" alt="">';
                html+='</div>';
                html+='<div class="col-6 d-flex flex-column justify-content-start">';
                    html+='<div class="row">';
                       html+='<a href = "'+urlPro+'"><h4>'+pro.name+'</h4></a>';
                    html+='</div>';
                    html+='<div class="row">';
                        html+='<span>$'+pro.price+'</span>';
                     html+='</div>';
                html+='</div>';
            html+='</div>';
			}
			$('.ajaxResult').html(html);
				}
			});

		})
	</script>