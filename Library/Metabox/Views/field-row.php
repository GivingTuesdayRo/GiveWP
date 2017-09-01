<?php
/** @var \GivingTuesdayWp\Library\Metabox\Field\AbstractField $field */
?>

<div id="container-<?php echo $field->getIdHtml(); ?>" class="givewp-field-container">
    <p class="label givewp-label">
        <label for="<?php echo $field->getIdHtml(); ?>">
            <?php echo $field->getLabel(); ?>
        </label>
    </p>
    <div class="givewp-field">
        <?php echo $this->load('fields/'.$field->getType(), ['field' => $field]); ?>
    </div>
</div>