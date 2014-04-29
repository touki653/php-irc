<?php

namespace Touki\IRC\Request;

use Touki\IRC\Request;

class TypedRequest implements Request
{
    protected $type;
    protected $content;

    /**
     * Constructor
     *
     * @param string $type    Type
     * @param string $content Content
     */
    public function __construct($type, $content)
    {
        $this->type = $type;
        $this->content = $content;
    }

    /**
     * Get request type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get request content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest()
    {
        return sprintf("%s :%s", $this->getType(), $this->getContent());
    }
}
