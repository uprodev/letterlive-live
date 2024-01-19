jQuery(document).ready(function($) { 

	$('.btn-loadmore').on('click', function(e){
		e.preventDefault();
		let _this = $(this);

		let data = {
			'action': 'loadmore',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('.posts-response').append(data); 
					this_page++;                     
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();               
					}
				} else {                             
					_this.remove();                   
				}
			}
		});
	});

});