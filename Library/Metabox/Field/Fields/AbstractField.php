<?php

namespace GivingTuesdayWp\Library\Metabox\Field\Fields;

/**
 * Class AbstractField
 * @package GivingTuesdayWp\Library\Metabox\Fields
 */
abstract class AbstractField
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $label;

    /**
     * @var string
     */
    protected $type = 'text';

    /**
     * @var string
     */
    protected $value = '';

    /**
     * @var string
     */
    protected $description = '';

    protected $settings = [
        'id',
        'name',
        'type',
        'label',
        'description',
        'value',
    ];

    /**
     * Metabox constructor.
     * @param array $settings
     */
    public function __construct($settings = [])
    {
        $this->initSettings($settings);
    }

    /**
     * @param array $settings
     */
    protected function initSettings($settings = [])
    {
        foreach ($settings as $name => $value) {
            if (in_array($name, $this->settings)) {
                $this->{$name} = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getIdHtml()
    {
        return 'givewp-field-'.$this->getId();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}
