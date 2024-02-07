<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildStoreRequest;
use App\Interface\Repositories\ChildRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert;

class ChildController extends Controller
{
    private $childRepository;

    public function __construct(ChildRepositoryInterface $childRepository)
    {
        $this->middleware('auth');
        $this->childRepository = $childRepository;
    }

    public function store(ChildStoreRequest $request)
    {
        $this->childRepository->store($request);

        Alert::success('Success', 'Child successfully added.');

        return back();
    }
}
