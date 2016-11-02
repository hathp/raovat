$(function() {

	var form = $('.show_box_comment');

       $("a.reply-review").click(function(){

           var comment_id = $(this).attr('id');

           $("[name='parent_id']").val(comment_id);

       });
        $("a.edit-review").click(function(){

            var comment_id = $(this).attr('id');

        });



});

