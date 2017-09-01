<?php

/** @var \GivingTuesdayWp\Library\Metabox\Field\RadioGroupField $field */
$options = $field->getOptionsValues();

/** @var \GivingTuesdayWp\Library\Metabox\Metabox $metabox */
$metabox = $this->metabox;
?>
<?php foreach ($options as $value => $label) { ?>
    <label>
        <input id="<?php echo $field->getId(); ?>"
               type="radio"
               name="<?php echo $field->getName(); ?>"
               value="<?php echo $value ?>"
            <?php echo $field->getValue() == $value ? 'checked="checked"' : ''; ?>
        >
        <?php echo $label; ?>
    </label>
<?php } ?>