<?php

declare(strict_types=1);
/**
 * This file is part of friendsofhyperf/mysql-grammar-addon.
 *
 * @link     https://github.com/friendsofhyperf/mysql-grammar-addon
 * @document https://github.com/friendsofhyperf/mysql-grammar-addon/blob/main/README.md
 * @contact  huangdijia@gmail.com
 */
namespace FriendsOfHyperf\MySqlGrammarAddon;

use FriendsOfHyperf\MySqlGrammarAddon\Aspect\MySqlGrammarAspect;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'aspects' => [
                MySqlGrammarAspect::class,
            ],
        ];
    }
}
