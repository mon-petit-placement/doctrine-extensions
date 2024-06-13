<?php
declare(strict_types=1);

namespace Oro\ORM\Query\AST\Functions\String;

use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\TokenType;

use Oro\ORM\Query\AST\Functions\AbstractPlatformAwareFunctionNode;

class Replace extends AbstractPlatformAwareFunctionNode
{
    public const SUBJECT_KEY = 'subject';
    public const FROM_KEY = 'from';
    public const TO_KEY = 'to';

    /**
     * {@inheritdoc}
     */
    public function parse(Parser $parser): void
    {
        $parser->match(TokenType::T_IDENTIFIER);
        $parser->match(TokenType::T_OPEN_PARENTHESIS);

        $this->parameters[self::SUBJECT_KEY] = $parser->StringPrimary();

        $parser->match(TokenType::T_COMMA);

        $this->parameters[self::FROM_KEY] = $parser->StringPrimary();

        $parser->match(TokenType::T_COMMA);

        $this->parameters[self::TO_KEY] = $parser->StringPrimary();

        $parser->match(TokenType::T_CLOSE_PARENTHESIS);
    }
}
