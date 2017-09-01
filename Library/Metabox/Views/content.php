<?php
/** @var \GivingTuesdayWp\Library\Metabox\Field\AbstractField $fields */
$fields = $this->fields;
?>
<!-- Default Themosis metabox view -->
<div class="form-table givewp-metabox">
    <?php foreach ($this->fields as $field) { ?>
        <?php echo $this->load('field-row', ['field' => $field]); ?>
    <?php } ?>
</div>