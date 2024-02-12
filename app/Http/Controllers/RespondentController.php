<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use Illuminate\Http\Request;

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
}
