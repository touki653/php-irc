<?php

namespace Touki\IRC;

/**
 * Base implementation of request
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
interface Request
{
    /**
     * Get request as string
     *
     * @return string Parsed request
     */
    public function getRequest();
}
