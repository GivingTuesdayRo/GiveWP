<?php

namespace GivingTuesdayWp\Library\Metabox\Field\Fields;

/**
 * Class RadioGroupField
 * @package GivingTuesdayWp\Library\Metabox\Fields
 */
class RadioGroupField extends AbstractField
{
    protected $optionsValues = [];

    /**
     * @param $value
     * @param $label
     */
    public function addOptionValue($value, $label = '')
    {
        $label = empty($label) ? $value : $value;
        $this->optionsValues[$value] = $label;
    }

    /**
     * @return array
     */
    public function getOptionsValues()
    {
        return $this->optionsValues;
    }

    /**
     * @param array $optionsValues
     */
    public function setOptionsValues($optionsValues)
    {
        $this->optionsValues = $optionsValues;
    }
}
