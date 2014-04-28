<?php

namespace Touki\IRC\Request;

use Touki\IRC\Request;

/**
 * Raw implementation of request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class RawRequest implements Request
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequest()
    {
        return $this->request;
    }
}
