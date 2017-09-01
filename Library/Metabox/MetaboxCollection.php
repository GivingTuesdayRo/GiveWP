<?php

namespace GivingTuesdayWp\Library\Metabox;

use GivingTuesdayWp\Library\Collections\AbstractCollection;

/**
 * Class MetaboxCollection
 * @package GivingTuesdayWp\Library\Metabox
 */
class MetaboxCollection extends AbstractCollection
{

    /**
     * @param Metabox $metabox
     */
    public function add($metabox)
    {
        $this->set($metabox->getId(), $metabox);
    }
}
