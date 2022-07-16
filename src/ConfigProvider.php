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

class ConfigProvider
{
    public function __invoke(): array
    {
        defined('BASE_PATH') or define('BASE_PATH', '');

        return [
            'dependencies' => [],
            'aspects' => [],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'commands' => [],
            'listeners' => [],
            'publish' => [],
        ];
    }
}
