<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AssistanceLogAttachmentRepositoryInterface;
use App\Interface\Repositories\AssistanceLogRepositoryInterface;
use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\UserRepositoryInterface;
use App\Models\AssistanceLogAttachment;
use App\Notifications\AssistanceLogNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AssistanceLogController extends Controller
{
    private $assistanceLogRepository;

    private $caseLogRepository;

    private $userRepository;

    private $assistanceLogAttachmentRepository;

    public function __construct(
        AssistanceLogRepositoryInterface $assistanceLogRepository,
        CaseLogRepositoryInterface $caseLogRepository,
        UserRepositoryInterface $userRepository,
        AssistanceLogAttachmentRepositoryInterface $assistanceLogAttachmentRepository
    ) {
        $this->middleware('auth');
        $this->assistanceLogRepository = $assistanceLogRepository;
        $this->caseLogRepository = $caseLogRepository;
        $this->userRepository = $userRepository;
        $this->assistanceLogAttachmentRepository = $assistanceLogAttachmentRepository;
    }

    public function store(Request $request)
    {
        $assistanceLog = $this->assistanceLogRepository->store($request);

        $log = $this->caseLogRepository->showById($request->case_log_id);

        if ($request->attachments) {
            foreach ($request->attachments as $attachment) {
                $image = new AssistanceLogAttachment();
                $image->addMedia($attachment)->toMediaCollection('assistanceMedia');
                $filePath = $image->getMedia('assistanceMedia')->last()->getPath();
                $appPath = Str::after($filePath, 'files/');
                $image->assistance_log_id = $assistanceLog->id;
                $image->file = $appPath;
                $image->save();
            }
        }

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
