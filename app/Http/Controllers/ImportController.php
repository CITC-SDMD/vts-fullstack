<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\ImportRepositoryInterface;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    private $importRepository;

    public function __construct(ImportRepositoryInterface $importRepository)
    {
        $this->importRepository = $importRepository;
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        return $this->importRepository->import($request);
    }
}
