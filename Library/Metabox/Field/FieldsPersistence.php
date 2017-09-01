<?php

namespace GivingTuesdayWp\Library\Metabox\Field;

use GivingTuesdayWp\Library\Metabox\Field\Fields\AbstractField;

/**
 * Class FieldsPersistence
 * @package GivingTuesdayWp\Library\Metabox\Field
 */
class FieldsPersistence
{
    /**
     * @var int
     */
    protected $postId;
    /**
     * @var FieldsCollection
     */
    protected $fields;
    /**
     * @var []
     */
    protected $data;

    /**
     * FieldsPersistence constructor.
     * @param $postId
     * @param $fields
     * @param $data
     */
    public function __construct($postId, $fields, $data = [])
    {
        $this->postId = $postId;
        $this->fields = $fields;
        $this->data = $data;
    }

    public function populateValues()
    {
        $fields = $this->getFields();
        foreach ($fields as $field) {
            if (metadata_exists('post', $this->getPostId(), $field->getName())) {
                $value = get_post_meta($this->getPostId(), $field->getName(), true);
                $field->setValue($value);
            }
        }
    }

    public function save()
    {
        $fields = $this->getFields();
        foreach ($fields as $field) {
            $value = $this->parseFieldValue($field);
            $this->saveField($field, $value);
        }
    }

    /**
     * @param AbstractField $field
     * @return mixed|string
     */
    protected function parseFieldValue($field)
    {
        if ($this->hasDataItem($field->getName())) {
            // Check if a "save" method exists. The method will parse the $_POST value
            // and transform it for DB save. Ex.: transform an array to string or int...
            if (method_exists($field, 'parseValue')) {
                // The field save method
                $value = $field->parseValue($this->getDataItem($field->getName()));
            } else {
                // No "save" method, only fetch the $_POST value.
                $value = $this->getDataItem($field->getName());
            }
        } else {
            // If nothing...setup a default value...
            $value = '';
        }

        return $value;
    }

    /**
     * @param AbstractField $field
     * @param $value
     */
    protected function saveField($field, $value)
    {
        $name = $field->getName();

        // Single meta key
        $oldValue = get_post_meta($this->getPostId(), $name, true); // unique value

        if (!empty($oldValue)) {
            update_post_meta($this->getPostId(), $name, $value, $oldValue);
        } elseif (!empty($value)) {
            update_post_meta($this->getPostId(), $name, $value);
        } else {
            delete_post_meta($this->getPostId(), $name);
        }
    }

    /**
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return FieldsCollection
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getDataItem($key)
    {
        return $this->hasDataItem($key) ? $this->data[$key] : null;
    }

    /**
     * @param $key
     * @return boolean
     */
    public function hasDataItem($key)
    {
        return isset($this->data[$key]);
    }
}
