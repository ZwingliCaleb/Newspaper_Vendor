<?php
require_once "data.php";
?>
<hr class="border-5 border-top border-secondary">
<div class="col-md-4">
    <label for="validationServer01" class="form-label">Name Of Supplier</label>
    <input name="title" type="text" class="form-control" id="fname" value="" required>
</div>
<div class="col-md-4">
    <label for="validationDefault04" class="form-label">Type of supplier</label>
    <select name="type" class="form-select" id="" required>
    <option >Individual</option>
    <option >Company</option>
    </select>
</div>
<div class="col-md-4">
    <label class="form-label">Phone Number</label>
    <input name="phone" value="<?php echo $phone ?>" type="text" class="form-control" id="" value="" required>
</div>