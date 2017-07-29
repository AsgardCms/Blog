<?php

namespace Modules\Blog\Events;

class PostContentIsRendering
{
    /**
     * @var string The body of the page to render
     */
    private $content;
    private $original;

    public function __construct($content)
    {
        $this->content = $content;
        $this->original = $content;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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
        return $this->getContent();
    }
}
