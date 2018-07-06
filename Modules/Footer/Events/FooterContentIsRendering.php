<?php

namespace Modules\Page\Events;

class FooterContentIsRendering
{
    /**
     * @var string The body of the page to render
     */
    private $footer;
    private $original;

    public function __construct($footer)
    {
        $this->footer = $footer;
        $this->original = $footer;
    }

    /**
     * @return string
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * @param string $body
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;
    }

    /**
     * @return mixed
     */
    public function getOriginal()
    {
        return $this->original;
    }

    public function __toString()
    {
        return $this->getFooter();
    }
}
