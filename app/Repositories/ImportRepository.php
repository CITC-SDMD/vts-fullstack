<?php

namespace App\Repositories;

use App\Imports\CaseImport;
use App\Interface\Repositories\ImportRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class ImportRepository implements ImportRepositoryInterface
{
    public function import(object $payload)
    {
        try {

            $validator = Validator::make($payload->all(), [
                'file' => ['required', 'file', 'mimes:xlsx,xls,csv', 'max:5120'],
            ]);

            if ($payload->file) {
                Excel::import(new CaseImport(), $payload->file);

                Alert::success('Success', 'Data successfully imported!');

                return back();
            }

            Alert::error('Error', $validator->messages()->first('file'));

            return back();
        } catch (Throwable $e) {
            return $e->getMessage();
        }
    }
}
