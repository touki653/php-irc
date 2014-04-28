<?php

namespace Touki\IRC;

class IrcResponse
{
    protected $content;
    protected $type;

    /**
     * Get Type
     *
     * @return string Type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Set Type
     *
     * @param string $type Type
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get Content
     *
     * @return string Content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Set Content
     *
     * @param string $content Content
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }
}
