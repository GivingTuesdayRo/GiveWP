<?php

namespace GivingTuesdayWp\Library\Metabox\Field;

use GivingTuesdayWp\Library\Collections\AbstractCollection;
use GivingTuesdayWp\Library\Metabox\Field\Fields\AbstractField;

/**
 * Class FieldsCollection
 * @package GivingTuesdayWp\Library\Metabox\Fields
 */
class FieldsCollection extends AbstractCollection
{
    /**
     * @param AbstractField $field
     */
    public function add($field)
    {
        $this->set($field->getId(), $field);
    }
}
