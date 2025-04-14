<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\FilesService
 */
class FileManager extends Facade {
    protected static function getFacadeAccessor(): string {
        return \App\Services\FilesService::class;
    }
}
