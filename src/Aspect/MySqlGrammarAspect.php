<?php

declare(strict_types=1);
/**
 * This file is part of friendsofhyperf/mysql-grammar-addon.
 *
 * @link     https://github.com/friendsofhyperf/mysql-grammar-addon
 * @document https://github.com/friendsofhyperf/mysql-grammar-addon/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\MySqlGrammarAddon\Aspect;

use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

/**
 * @Aspect
 */
#[Aspect()]
class MySqlGrammarAspect extends AbstractAspect
{
    /**
     * @var string[]
     */
    public $classes = [
        'Hyperf\Database\Schema\Grammars\MySqlGrammar::compileColumnListing',
        'Hyperf\Database\Schema\Grammars\MySqlGrammar::compileColumns',
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        return match ($proceedingJoinPoint->getReflectMethod()->getName()) {
            'compileColumnListing' => str_replace(
                ', `column_comment` as `column_comment`,',
                ', binary `column_comment` as `column_comment`,',
                $proceedingJoinPoint->process()
            ),
            'compileColumns' => str_replace(
                ', `column_comment`',
                ', binary `column_comment`',
                $proceedingJoinPoint->process()
            ),
            default => $proceedingJoinPoint->process()
        };
    }
}
