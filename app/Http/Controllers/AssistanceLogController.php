<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AssistanceLogRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AssistanceLogController extends Controller
{
    private $assistanceLogRepository;

    public function __construct(AssistanceLogRepositoryInterface $assistanceLogRepository)
    {
        $this->middleware('auth');
        $this->assistanceLogRepository = $assistanceLogRepository;
    }

    public function store(Request $request)
    {
        $this->assistanceLogRepository->store($request);

        Alert::success('Success', 'Assistance log saved successfully.');

        return back();
    }
}
