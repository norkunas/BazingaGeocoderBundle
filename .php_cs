<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(__DIR__.'/vendor')
;
return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'php_unit_mock_short_will_return' => true,
        'php_unit_test_case_static_method_calls' => [
            'call_type' => 'self',
        ],
    ])
    ->setFinder($finder)
;
