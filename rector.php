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
    $rectorConfig->paths([
        __DIR__,
    ]);
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $rectorConfig->paths([
        __DIR__,
    ]);
=======
=======
>>>>>>> origin/develop
    $rectorConfig->paths(
        [
            __DIR__,
        ]
    );
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    $rectorConfig->paths([
        __DIR__,
    ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    // register a single rule
    // $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    // $rectorConfig->rule(RedirectRouteToToRouteHelperRector::class);
    // $rectorConfig->rules([
    //    ReturnTypeFromStrictNativeCallRector::class,
    //    ReturnTypeFromStrictScalarReturnExprRector::class,
    // ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
    $rectorConfig->rules([
        ReturnTypeFromStrictNativeCallRector::class,
        ReturnTypeFromStrictScalarReturnExprRector::class,
    ]);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)

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
=======
=======
>>>>>>> origin/develop
    $rectorConfig->rules(
        [
            ReturnTypeFromStrictNativeCallRector::class,
            ReturnTypeFromStrictScalarReturnExprRector::class,
        ]
    );
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)

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

<<<<<<< HEAD
=======

    // define sets of rules
    $rectorConfig->sets(
        [
            PHPUnitLevelSetList::UP_TO_PHPUNIT_100,
            // SetList::DEAD_CODE,
            // SetList::CODE_QUALITY,
            LevelSetList::UP_TO_PHP_81,
            LaravelSetList::LARAVEL_100,

>>>>>>> origin/develop
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
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
    $rectorConfig->skip([
        // testdummy files
        '*/build',
        '*/docs',
        '*/vendor',
        './vendor/',
        __DIR__ . '/vendor',
    ]);
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

    $rectorConfig->importNames();
};
