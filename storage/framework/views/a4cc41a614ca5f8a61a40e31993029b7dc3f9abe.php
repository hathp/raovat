<script type="text/javascript">
	$(document).ready(function()
	{
		$("select#product_categories").change(function(){
			$('#engine').find('option').remove().end();
			var category_id = $(this).find("option:selected").val();
			$.ajax({
				url:'<?php echo e(route('admin.product.category.find')); ?>',
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

