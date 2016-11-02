<script type="text/javascript">
	$(document).ready(function()
	{
	    $('#product_category').on('change',function()
		{
			 	var category_id = $(this).val();
				var product_id = $(this).attr("product_id");
				if (!product_id) {product_id = 0;}
			 	var option_content = $('#option');
				$.ajax({
						url: '<?php echo e(route('admin.product.option.get_option')); ?>',
						data: {'category_id':category_id,'product_id':product_id,_token: $('meta[name="csrf-token"]').attr('content')},
						type: 'POST',
						success: function(data)
						{
							option_content.html(data);
							return false;
						}
				 });
	    });

		$('#product_category').trigger('change');
	});


	$(document).ready(function() {

//		target = $('div.form-body div.row:first-child').clone();
//
//		$('.duplicate').on('click', function(event) {
//			$('div.form-body').append(target.clone());
//			FormInputMask.init();
//		});

		clone = $($('div.prescription div:first-child')[0]).clone().find("input:text").val("").end();

		$('.duplicate').on('click', function(event) {
			$(clone.clone()).appendTo('.prescription');
		});

		$('.prescription').on('click', '.delete', function(event) {
			$($(this).parents('.row')[0]).remove();
		});

	});


</script>

