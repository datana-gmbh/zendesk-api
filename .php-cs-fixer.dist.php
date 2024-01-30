<?php

declare(strict_types=1);

use Ergebnis\PhpCsFixer;

$header = <<<'HEADER'
This file is part of Zendesk-Api.

(c) Datana GmbH <info@datana.rocks>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
HEADER;

$ruleSet = PhpCsFixer\Config\RuleSet\Php82::create()->withHeader($header)->withRules(PhpCsFixer\Config\Rules::fromArray([
    'blank_line_before_statement' => [
        'statements' => [
            'break',
            'continue',
            'declare',
            'default',
            'do',
            'exit',
            'for',
            'foreach',
            'goto',
            'if',
            'include',
            'include_once',
            'require',
            'require_once',
            'return',
            'switch',
            'throw',
            'try',
            'while',
        ],
    ],
    'concat_space' => [
        'spacing' => 'none',
    ],
    'date_time_immutable' => false,
    'error_suppression' => false,
    'final_class' => false,
    'mb_str_functions' => false,
    'native_function_invocation' => [
        'exclude' => [],
        'include' => [
            '@compiler_optimized',
        ],
        'scope' => 'all',
        'strict' => false,
    ],
    'php_unit_internal_class' => false,
    'php_unit_test_annotation' => [
        'style' => 'annotation',
    ],
    'php_unit_test_class_requires_covers' => false,
    'PhpCsFixerCustomFixers/phpdoc_array_style' => false,
    'PhpCsFixerCustomFixers/phpdoc_type_list' => false,
    'attribute_empty_parentheses' => false,
]));

$config = PhpCsFixer\Config\Factory::fromRuleSet($ruleSet);

$config->getFinder()
    ->in('src')
    ->in('tests');
;

return $config;
