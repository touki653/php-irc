<?php

namespace Touki\IRC;

class MessageResponse
{
    protected $content;
    protected $type;
    protected $from;
    protected $to;

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

    /**
     * Get From
     *
     * @return User from
     */
    public function getFrom()
    {
        return $this->from;
    }
    
    /**
     * Set From
     *
     * @param User $from From
     */
    public function setFrom(User $from)
    {
        $this->from = $from;
    
        return $this;
    }

    /**
     * Get To
     *
     * @return string To
     */
    public function getTo()
    {
        return $this->to;
    }
    
    /**
     * Set To
     *
     * @param string $to To
     */
    public function setTo($to)
    {
        $this->to = $to;
    
        return $this;
    }
}
