<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AssistanceLogRepositoryInterface;
use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Notifications\AssistanceLogNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class AssistanceLogController extends Controller
{
    private $assistanceLogRepository;

    private $caseLogRepository;

    private $userRepository;

    public function __construct(
        AssistanceLogRepositoryInterface $assistanceLogRepository,
        CaseLogRepositoryInterface $caseLogRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->middleware('auth');
        $this->assistanceLogRepository = $assistanceLogRepository;
        $this->caseLogRepository = $caseLogRepository;
        $this->userRepository = $userRepository;
    }

    public function store(Request $request)
    {
        $this->assistanceLogRepository->store($request);

        $log = $this->caseLogRepository->showById($request->case_log_id);

        $user = auth()->user();

        if ($user->agency_id != $log->referredBy->agency_id) {
            $referredByUsers = $this->userRepository->showByAgencyId($log->referredBy->agency_id);
            Notification::send($referredByUsers, new AssistanceLogNotification($log));
        }

        if ($user->agency_id != $log->referral_agency_id) {
            $referralUsers = $this->userRepository->showByAgencyId($log->referral_agency_id);
            Notification::send($referralUsers, new AssistanceLogNotification($log));
        }

        Alert::success('Success', 'Assistance log saved successfully.');

        return back();
    }
}
