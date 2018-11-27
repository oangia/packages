<?php

namespace oangia\OAuth\Exceptions;

class TokenInvalidException extends BaseException
{
    /**
     * @var int
     */
    protected $statusCode = 498;
}
