<?php

namespace App\Repositories;

use App\Imports\CaseImport;
use App\Interface\Repositories\ImportRepositoryInterface;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class ImportRepository implements ImportRepositoryInterface
{
    public function import(object $payload)
    {
        try {
            Excel::import(new CaseImport(), $payload->file);

            return true;
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
