<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RespondentController extends Controller
{
    private $respondentRepository;

    private $clientRepository;

    public function __construct(
        RespondentRepositoryInterface $respondentRepository,
        ClientRepositoryInterface $clientRepository
    ) {
        $this->middleware('auth');
        $this->respondentRepository = $respondentRepository;
        $this->clientRepository = $clientRepository;
    }

    public function show(int $complainantId)
    {
        $respondentIds = $this->respondentRepository->showRespondentIdArray($complainantId);
        $respondents = $this->clientRepository->showRespondentList($respondentIds);

        return $respondents;
    }

    public function store(Request $request)
    {
        $respondent = $this->respondentRepository->showByComplainantIdRespondentId($request->complainant_id, $request->respondent_id);

        if ($respondent) {
            Alert::error('Error', 'Respondent already exists in your profile.');

            return back();
        }

        $this->respondentRepository->store($request->complainant_id, $request->respondent_id);

        Alert::success('Success', 'Respondent added to your profile.');

        return back();
    }
}
