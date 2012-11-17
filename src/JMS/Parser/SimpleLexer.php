<?php

namespace JMS\Parser;

/**
 * The simple lexer is a fully usable lexer that does not require sub-classing.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class SimpleLexer extends AbstractLexer
{
    private $regex;
    private $callable;
    private $tokenNames;

    public function __construct($regex, array $tokenNames, $typeCallable)
    {
        $this->regex = $regex;
        $this->callable = $typeCallable;
        $this->tokenNames = $tokenNames;
    }

    public function getName($type)
    {
        if ( ! isset($this->tokenNames[$type])) {
            throw new \InvalidArgumentException(sprintf('There is no token with type %s.', json_encode($type)));
        }

        return $this->tokenNames[$type];
    }

    protected function getRegex()
    {
        return $this->regex;
    }

    protected function determineTypeAndValue($value)
    {
        return call_user_func($this->callable, $value);
    }
}