<?php

namespace Touki\IRC;

class User
{
    protected $nickname;
    protected $ident;
    protected $host;

    /**
     * Get Nickname
     *
     * @return string Nickname
     */
    public function getNickname()
    {
        return $this->nickname;
    }
    
    /**
     * Set Nickname
     *
     * @param string $nickname Nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    
        return $this;
    }

    /**
     * Get Ident
     *
     * @return string ident
     */
    public function getIdent()
    {
        return $this->ident;
    }
    
    /**
     * Set Ident
     *
     * @param string $ident Ident
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;
    
        return $this;
    }

    /**
     * Get Host
     *
     * @return string host
     */
    public function getHost()
    {
        return $this->host;
    }
    
    /**
     * Set Host
     *
     * @param string $host Host
     */
    public function setHost($host)
    {
        $this->host = $host;
    
        return $this;
    }
}
