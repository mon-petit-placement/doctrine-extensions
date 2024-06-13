<?php
declare(strict_types=1);

namespace Oro\ORM\Query\AST\Functions\Numeric;

use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\TokenType;
use Oro\ORM\Query\AST\Functions\AbstractPlatformAwareFunctionNode;

class Pow extends AbstractPlatformAwareFunctionNode
{
    public const VALUE_KEY = 'value';
    public const POWER_KEY = 'power';

    /**
     * {@inheritdoc}
     */
    public function parse(Parser $parser): void
    {
        $parser->match(TokenType::T_IDENTIFIER);
        $parser->match(TokenType::T_OPEN_PARENTHESIS);
        $this->parameters[self::VALUE_KEY] = $parser->SimpleArithmeticExpression();
        $parser->match(TokenType::T_COMMA);
        $this->parameters[self::POWER_KEY] = $parser->ArithmeticPrimary();
        $parser->match(TokenType::T_CLOSE_PARENTHESIS);
    }
}
