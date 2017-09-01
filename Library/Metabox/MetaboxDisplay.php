<?php

namespace GivingTuesdayWp\Library\Metabox;

use WP_Post;

/**
 * Class View
 * @package GivingTuesdayWp\Library\Metabox
 */
class MetaboxDisplay
{

    /**
     * @var Metabox
     */
    protected $metabox;

    /**
     * @var WP_Post
     */
    protected $post;

    /**
     * @var array
     */
    protected $arguments = [];

    /**
     * @var View
     */
    protected $view;

    /**
     * View constructor.
     * @param $metabox
     * @param $post
     * @param $arguments
     */
    public function __construct($metabox, $post, $arguments)
    {
        $this->metabox = $metabox;
        $this->post = $post;
        $this->arguments = $arguments;
        $this->view = new View();
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->view->set('fields' , $this->metabox->getFields());
        return $this->view->load('content');
    }
}
