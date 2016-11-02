<script type="text/javascript">
	$(document).ready(function()
	{
	    $('#product_category').on('change',function()
		{
			var category_id = $(this).val();
			var product_id = $(this).attr("product_id");
			if (!product_id) {product_id = 0;}
			var option_content = $('#option');
			var attribute_content = $('#attribute');
			var manufacture_content = $('#manufacture');
			$.ajax({
					url: '{{ route('admin.product.option.get_option') }}',
					data: {'category_id':category_id,'product_id':product_id,_token: $('meta[name="csrf-token"]').attr('content')},
					type: 'POST',
					success: function(data)
					{
						option_content.html(data);
						return false;
					}
			 });

			$.ajax({
				url: '{{ route('admin.product.attribute.get_value') }}',
				data: {'category_id':category_id,'product_id':product_id,_token: $('meta[name="csrf-token"]').attr('content')},
				type: 'POST',
				success: function(data)
				{
					attribute_content.html(data);
					return false;
				}
			});

			$.ajax({
				url: '{{ route('admin.manufacture.get_manufac') }}',
				data: {'category_id':category_id,'product_id':product_id,_token: $('meta[name="csrf-token"]').attr('content')},
				type: 'POST',
				success: function(data)
				{
					manufacture_content.html(data);
					return false;
				}
			});

	    });

		$('#product_category').trigger('change');
	});


	$(document).ready(function() {

		clone = $($('div.prescription div:first-child')[0]).clone().find("input:text").val("").end();

		$('.duplicate').on('click', function(event) {

			$(clone.clone()).appendTo('.prescription');

		});


		$('.prescription').on('click', '.delete', function(event) {
			$($(this).parents('.row')[0]).remove();
		});



		$('#option_product').on('click', '.delete', function(event) {
			var attributeList = $($(this).parents('div.attribute')[0]).find('div.row').length;
			if(attributeList > 1){
				$($(this).parents('.row')[0]).remove();
			}

		});

		$('#option_product').on("click",'.plus', function(event){
//			var attributeList = $($(this).parents('div.attributes')[0]).find('div.attribute-list');
			var attribute = $($('div.attribute div:first-child')[0]).clone().find("input:text").val("").end();
			$(attribute.clone()).appendTo('.attribute');
		});

	});

	$(document).ready(function()
	{
		$("select#product_categories").change(function(){
			$('#engine').find('option').remove().end();
			var category_id = $(this).find("option:selected").val();
			$.ajax({
				url:'{{ route('admin.product.find') }}',
				type:'POST',
				data:{category_id:category_id,_token: $('meta[name="csrf-token"]').attr('content')},
				dataType:'text',
				cache:false,
				success:function(data){
					$("#engine").empty();
					$("#engine").html(data);
				},
				error:function(data){
//
				}
			});
		});
	});


</script>

