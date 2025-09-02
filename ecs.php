<?php

declare(strict_types=1);

return Symplify\EasyCodingStandard\Config\ECSConfig::configure()
    ->withConfiguredRule(
        PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class,
        [
            'space_before_parenthesis' => true,
        ],
    )
    ->withConfiguredRule(
        PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class,
        [
            'order' => [
                'use_trait',
                'constant_public',
                'constant_protected',
                'constant_private',
                'case',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'magic',
                'phpunit',
                'method_public',
                'method_protected',
                'method_private',
            ],
            'sort_algorithm' => 'alpha',
        ],
    )
    ->withConfiguredRule(
        PhpCsFixer\Fixer\Import\OrderedImportsFixer::class,
        [
            'imports_order' => ['class', 'function', 'const'],
            'sort_algorithm' => 'alpha',
        ],
    )
    ->withConfiguredRule(
        PhpCsFixer\Fixer\ClassNotation\VisibilityRequiredFixer::class,
        [
            'elements' => [],
        ],
    )
    ->withFileExtensions(['php'])
    ->withPaths(
        [
            __DIR__ . '/config',
            __DIR__ . '/src',
            __DIR__ . '/tests',
        ],
    )
    ->withPhpCsFixerSets(perCS20: true)
    ->withPreparedSets(
        cleanCode: true,
        comments:true,
        docblocks: true,
        namespaces: true,
        strict: true,
    )
    ->withRules(
        [
            PhpCsFixer\Fixer\ClassNotation\OrderedTraitsFixer::class,
            PhpCsFixer\Fixer\Import\NoUnusedImportsFixer::class,
            PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer::class,
        ]
    );
