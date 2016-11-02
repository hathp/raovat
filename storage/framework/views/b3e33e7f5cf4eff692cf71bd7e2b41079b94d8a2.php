<script type="text/javascript">
    $(document).ready(function(){
        $('#product_category').change(function()
        {
            var category_id = $(this).val();
            var content = $('#product_option');
            $.ajax({
                url : '<?php echo e(route('admin.product.option.option')); ?>',
                dataType: 'json',
                type: 'POST',
                data: {'category_id':category_id,_token: $('meta[name="csrf-token"]').attr('content'),},
                success: function(result)
                {
                    var html = '<label>Thuộc tính cha<span class="required" aria-required="true">*</span></label><select name="parent_id" class="form-control">';
                    html += '<option value="0">Thuộc tính gốc</option>';
                    for(i=0;i<result.length;i++)
                    {
                        html += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
                    }
                    html += '</select>';
                    content.html(html);
                }
            });
        });

        $('body').on('change', '#product_categoies', function()
        {
            var category_id = $(this).val();
            var _optionId = $(this).attr("_optionId");
            if (!_optionId) {_optionId = 0;}
            var content = $('#product_options');
            $.ajax({
                url : '<?php echo e(route('admin.product.option.option')); ?>',
                dataType: 'json',
                type: 'POST',
                data: {'category_id':category_id,_token: $('meta[name="csrf-token"]').attr('content'),'optionId':_optionId},
                success: function(result)
                {console.log(result);
                    var html = '<label>Thuộc tính cha<span class="required" aria-required="true">*</span></label><select name="parent_id" class="form-control">';
                    html += '<option value="0">Thuộc tính gốc</option>';
                    for(i=0;i<result.length;i++)
                    {
                        html += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
                    }
                    html += '</select>';
                    content.html(html);
                }
            });
        });

    });

    $(".colorbox").colorbox({rel:'colorbox'});
</script>

