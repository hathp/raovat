<div class="tab-content">
    <div class="tab-pane active" id="content">
        <div>
                <?php /* Name input field*/ ?>
                <?php echo FormHelper::text('Họ tên', 'name', null, ['input' => ['required']]); ?>


                <?php /* Email input field*/ ?>
                <?php echo FormHelper::email('Email', 'email', null, ['input' => ['required']]); ?>


                <?php /* Mobile input fiel */ ?>
                <?php echo FormHelper::text('SĐT', 'phone', null, ['input' => ['required']]); ?>


                <?php echo FormHelper::textarea('Nội dung', 'message'); ?>

        </div>
    </div>
</div>
