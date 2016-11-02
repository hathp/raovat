<script type="text/javascript">

	$(document).ready(function() {

		clone = $($('div.prescription div:first-child')[0]).clone().find("input:text").val("").end();

		$('.duplicate').on('click', function(event) {
			$(clone.clone()).appendTo('.prescription');
		});

		$('.prescription').on('click', '.delete', function(event) {
			$($(this).parents('.row')[0]).remove();
		});



	});


	$('#my_multi_select2').multiSelect({
		selectableOptgroup: true
	});
</script>

