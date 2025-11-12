<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitLevelSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNativeCallRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
<<<<<<< HEAD
<<<<<<< HEAD
    $rectorConfig->paths([
        __DIR__,
    ]);
=======
    $rectorConfig->paths(
        [
            __DIR__,
        ]
    );
>>>>>>> fbc8f8e (.)
=======
    $rectorConfig->paths([
        __DIR__,
    ]);
>>>>>>> 6d20fbe (.)

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
    // $rectorConfig->rules([
    //    ReturnTypeFromStrictNativeCallRector::class,
    //    ReturnTypeFromStrictScalarReturnExprRector::class,
    // ]);
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
    $rectorConfig->rules([
        ReturnTypeFromStrictNativeCallRector::class,
        ReturnTypeFromStrictScalarReturnExprRector::class,
    ]);

    // define sets of rules
    $rectorConfig->sets([
        PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
        // SetList::DEAD_CODE,
        // SetList::CODE_QUALITY,
        LevelSetList::UP_TO_PHP_81,
        LaravelSetList::LARAVEL_100,
        // SetList::NAMING, // error on injection
        // SetList::TYPE_DECLARATION,  //------------------------ vedere cosa fa
        // SetList::CODING_STYLE,
        // SetList::PRIVATIZATION, //error "final class"
        // SetList::EARLY_RETURN,
        // SetList::INSTANCEOF,
    ]);

    $rectorConfig->skip([
        // testdummy files
        '*/build',
        '*/docs',
        '*/vendor',
        './vendor/',
        __DIR__.'/vendor',
    ]);
<<<<<<< HEAD
=======
    $rectorConfig->rules(
        [
            ReturnTypeFromStrictNativeCallRector::class,
            ReturnTypeFromStrictScalarReturnExprRector::class,
        ]
    );

    // define sets of rules
    $rectorConfig->sets(
        [
            PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
            // SetList::DEAD_CODE,
            // SetList::CODE_QUALITY,
            LevelSetList::UP_TO_PHP_81,
            LaravelSetList::LARAVEL_100,

            // SetList::NAMING, // error on injection
            // SetList::TYPE_DECLARATION,  //------------------------ vedere cosa fa
            // SetList::CODING_STYLE,
            // SetList::PRIVATIZATION, //error "final class"
            // SetList::EARLY_RETURN,
            // SetList::INSTANCEOF,
        ]
    );

    $rectorConfig->skip(
        [
            // testdummy files
            '*/build',
            '*/docs',
            '*/vendor',
            './vendor/',
            __DIR__.'/vendor',
        ]
    );
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)

    $rectorConfig->importNames();
};
