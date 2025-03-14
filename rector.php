<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    // Directory da analizzare
    $rectorConfig->paths([__DIR__]);

    // Imposta il livello PHP a 8.3
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::PERFORMANCE,
    ]);

    // Auto-importazione delle classi
    $rectorConfig->importNames();
};