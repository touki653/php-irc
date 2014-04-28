<?php

namespace Touki\IRC\Event;

use Touki\IRC\Application;
use Touki\IRC\Requester;
use Touki\IRC\Event;

class ApplicationEvent extends Event
{
    protected $application;
    protected $requester;

    public function __construct(Application $application, Requester $requester)
    {
        $this->requester = $requester;
        $this->application = $application;
    }

    /**
     * Get Application
     *
     * @return Application Application
     */
    public function getApplication()
    {
        return $this->application;
    }
    
    /**
     * Set Application
     *
     * @param Application $application Application
     */
    public function setApplication(Application $application)
    {
        $this->application = $application;
    
        return $this;
    }

    /**
     * Get Requester
     *
     * @return Requester Requester
     */
    public function getRequester()
    {
        return $this->requester;
    }
    
    /**
     * Set Requester
     *
     * @param Requester $requester Requester
     */
    public function setRequester(Requester $requester)
    {
        $this->requester = $requester;
    
        return $this;
    }
}
