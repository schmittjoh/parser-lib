<?php

namespace JMS\Parser;

class SyntaxErrorException extends \RuntimeException
{
    private $actualToken;
    private $context;

    public function setActualToken(array $actualToken)
    {
        $this->actualToken = $actualToken;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }

    public function getActualToken()
    {
        return $this->actualToken;
    }

    public function getContext()
    {
        return $this->context;
    }
}
