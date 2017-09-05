<?php

namespace GivingTuesdayWp\Library\Metabox;

use GivingTuesdayWp\Library\Metabox\Field\FieldsPersistence;
use function GivingTuesdayWp\Theme\asset_path;
use WP_Post;

/**
 * Class MetaboxManager
 * @package GivingTuesdayWp\Library\Metabox
 */
class MetaboxManager
{
    /**
     * The singleton instance.
     *
     * @var object
     */
    protected static $instance = null;

    /**
     * @var MetaboxCollection
     */
    protected $metaboxes;

    /**
     * The nonce name.
     *
     * @var string
     */
    protected $nonce = '_giveWp';
    /**
     * The nonce action.
     *
     * @var string
     */
    protected $nonceAction = 'metabox';

    /**
     * MetaboxManager constructor.
     */
    public function __construct()
    {
        $this->metaboxes = new MetaboxCollection();
        $this->hookActions();
    }

    /**
     * @param $settings
     * @return Metabox
     */
    public function newMetabox($settings)
    {
        $metabox = MetaboxBuilder::create($settings);
        $this->metaboxes->add($metabox);

        return $metabox;
    }

    public function register()
    {
        $metaboxes = $this->getMetaboxes();
        foreach ($metaboxes as $metabox) {
            $this->registerMetabox($metabox);
        }
    }

    /**
     * Display the metabox content
     *
     * @param WP_Post $post The current post.
     * @param array $arguments With metabox id, title, callback, and args elements.
     */
    public function display($post, $arguments)
    {
        wp_nonce_field($this->nonceAction, $this->nonce);

        $metabox = $this->getMetaboxes()->get($arguments['id']);
        if ($metabox) {
            $fields = $metabox->getFields();
            (new FieldsPersistence($post->ID, $fields))->read();
            $view = new MetaboxDisplay($metabox, $post, $arguments);
            echo $view->render();
        }
    }

    /**
     * Save metabox data.
     * @param int $postId Current post type ID.
     */
    public function save($postId)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        $nonceName = (isset($_POST[$this->nonce])) ? $_POST[$this->nonce] : $this->nonce;
        if (!wp_verify_nonce($nonceName, $this->nonceAction)) {
            return;
        }

        $metaboxes = $this->getMetaboxes();
        foreach ($metaboxes as $metabox) {
            $this->saveMetabox($metabox, $postId);
        }
    }

    public function scripts()
    {
        // Metabox.
        wp_enqueue_script(
            'givewp-metaboxes-admin',
            asset_path('/scripts/metaboxes.js'),
            ['jquery'],
            null,
            true
        );
        wp_enqueue_style(
            'givewp-metaboxes-admin',
            asset_path('/styles/metaboxes.css'),
            [],
            null,
            'all'
        );
    }

    /**
     * @return MetaboxCollection
     */
    public function getMetaboxes()
    {
        return $this->metaboxes;
    }

    /**
     * @param $metabox
     * @param $field
     * @param null $default
     * @return null
     * @internal param $key
     */
    public function getFieldValue($metabox, $field, $default = null)
    {
        $metabox = $this->getMetaboxes()->get($metabox);
        if ($metabox) {
            $fields = $metabox->getFields();
            (new FieldsPersistence(get_the_ID(), $fields))->read();
            $field = $metabox->getFields()->get($field);
            if ($field) {
                return $field->getValue();
            }
        }

        return $default;
    }

    /**
     * @param Metabox $metabox
     */
    protected function registerMetabox($metabox)
    {
        foreach ($metabox->getPostType() as $postType) {
            add_meta_box(
                $metabox->getId(),
                $metabox->getTitle(),
                [$this, 'display'],
                $postType,
                $metabox->getContext(),
                $metabox->getPriority()
            );

        }
    }

    /**
     * @param Metabox $metabox
     * @param $postId
     */
    protected function saveMetabox($metabox, $postId)
    {
        // Grab current custom post type name.
        $postType = get_post_type($postId);

        if (!$metabox->inPostType($postType)) {
            return;
        }

        $fields = $metabox->getFields();
        (new FieldsPersistence($postId, $fields, $_POST))->save();
    }

    protected function hookActions()
    {
        // Add Metabox.
        add_action('add_meta_boxes', [$this, 'register']);

        // Save Metaboxs.
        add_action('save_post', [$this, 'save']);

        // Load scripts.
        add_action('admin_enqueue_scripts', [$this, 'scripts']);
    }

    /**
     * Return an instance of this class.
     *
     * @return self A single instance of this class.
     */
    public static function instance()
    {
        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}
