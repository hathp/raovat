<?php /* product manufacture id */ ?>
<div class="form-group">
    <label>Hãng sản xuất</label>
    <select  class="form-control" name="manufacture_id">
        <option > Chọn hãng sản xuất</option>
        <?php foreach($manufactures as $manufacture): ?>
            <option value="<?php echo e($manufacture->id); ?>" <?php if(isset($manufacture_id)): ?>  <?php echo e((  $manufacture_id == $manufacture->id ) ? 'selected="selected"' : ''); ?> <?php endif; ?>> <?php echo e($manufacture->name); ?></option>
        <?php endforeach; ?>
    </select>
</div>
