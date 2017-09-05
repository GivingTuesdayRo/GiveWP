<?php

namespace GivingTuesdayWp\Library\Metabox;

use GivingTuesdayWp\Library\Metabox\Field\FieldsCollection;
use GivingTuesdayWp\Library\Metabox\Field\FieldsBuilder;

/**
 * Class Metabox
 * @package GivingTuesdayWp\Library\Metabox
 */
class Metabox
{

    // Unique ID of the menu item
    protected $id = '';

    // Name of the menu item
    protected $title = '';

    // Post type, can be an array of post types
    protected $postType = 'post';

    // if page template is selected, just will be show on that page
    protected $postTemplate = '';

    // normal, advanced, or side
    protected $context = 'normal';

    // If true, the custom fields box will not be shown
    protected $hideCustomFields = true;

    // high, core, default, low
    protected $priority = 'low';

    // Description displayed below the title
    protected $desc = '';

    // 'parent' => null, // slug of parent, if blank, then this is a top level menu
    // 'capability' => 'manage_options', // User role
    // 'icon' => 'dashicons-admin-generic', // Menu icon for top level menus only
    // 'position' => 100.01 // Menu position for top level menus only

    protected $fields;

    protected $settings = [
        'id',
        'title',
        'postType',
        'pageTemplate',
        'context',
        'hide_custom_fields',
        'priority',
        'desc',
    ];

    /**
     * Metabox constructor.
     * @param array $settings
     */
    public function __construct($settings = [])
    {
        $this->initSettings($settings);
        $this->fields = new FieldsCollection();
        if (isset($settings['fields']) && is_array($settings['fields'])) {
            foreach ($settings['fields'] as $field) {
                $this->addField($field);
            }
        }
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
     * @param $settings
     * @return Field\AbstractField
     */
    public function addField($settings)
    {
        $field = FieldsBuilder::create($settings);
        $field->setName('givewp_'.$this->getId().'_'.$field->getName());
        $field->setId($field->getName());
        $this->getFields()->add($field);
        return $field;
    }

    // ---------------- GETTERS & SETTERS --------------------- //

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return array
     */
    public function getPostType()
    {
        return is_array($this->postType) ? $this->postType : [$this->postType];
    }

    /**
     * @param $type
     * @return bool
     */
    public function inPostType($type)
    {
        return in_array($type, $this->getPostType());
    }

    /**
     * @return string
     */
    public function getPostTemplate()
    {
        return $this->postTemplate;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return bool
     */
    public function isHideCustomFields()
    {
        return $this->hideCustomFields;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * @return FieldsCollection
     */
    public function getFields()
    {
        return $this->fields;
    }
}
