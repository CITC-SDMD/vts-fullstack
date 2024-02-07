<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFullnameRequest;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\RespondentStoreRequest;
use App\Http\Requests\SearchRequest;
use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ChildRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    private $clientRepository;

    private $barangayRepository;

    private $caseProfileRepository;

    private $respondentRepository;

    private $childRepository;

    private $relationshipRepository;

    private $caseCategoryRepository;

    private $abuseCategoryRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        BarangayRepositoryInterface $barangayRepository,
        CaseProfileRepositoryInterface $caseProfileRepository,
        RespondentRepositoryInterface $respondentRepository,
        ChildRepositoryInterface $childRepository,
        RelationshipRepositoryInterface $relationshipRepository,
        CaseCategoryRepositoryInterface $caseCategoryRepository,
        AbuseCategoryRepositoryInterface $abuseCategoryRepository
    ) {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
        $this->barangayRepository = $barangayRepository;
        $this->caseProfileRepository = $caseProfileRepository;
        $this->respondentRepository = $respondentRepository;
        $this->childRepository = $childRepository;
        $this->relationshipRepository = $relationshipRepository;
        $this->caseCategoryRepository = $caseCategoryRepository;
        $this->abuseCategoryRepository = $abuseCategoryRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->index();
        $barangays = $this->barangayRepository->index();

        $data = (object) [
            'clients' => $clients,
            'barangays' => $barangays,
            'pagination' => $clients->links('components.pagination'),
        ];

        return view('pages.clients', [
            'data' => $data,
        ]);
    }

    public function search(SearchRequest $request)
    {
        $clients = $this->clientRepository->search($request);
        $barangays = $this->barangayRepository->index();

        $data = (object) [
            'clients' => $clients,
            'barangays' => $barangays,
            'pagination' => $clients->links('components.pagination'),
        ];

        return view('pages.clients', [
            'data' => $data
        ]);
    }

    public function store(ClientStoreRequest $request)
    {
        $client = $this->clientRepository->create($request);

        Alert::success('Sucess', 'Client successfully created.');

        return redirect()->route('client.show', $client->uuid);
    }

    public function storeRespondent(RespondentStoreRequest $request)
    {
        $client = $this->clientRepository->create($request);
        $this->respondentRepository->store($request->complainant_id, $client->id);

        Alert::success('Success', 'Respondent successfully created.');

        return back();
    }

    public function show($uuid)
    {
        $client = $this->clientRepository->showByUuid($uuid);

        Session::put('client', $client);

        return view('clients.client-profile');
    }

    public function showCases(string $uuid)
    {
        $client = $this->clientRepository->showByUuid($uuid);
        $cases = $this->caseProfileRepository->showByClientId($client->id);
        $relationships = $this->relationshipRepository->index();
        $caseCategories = $this->caseCategoryRepository->index();
        $abuseCategories = $this->abuseCategoryRepository->index();


        $data = (object) [
            'cases' => $cases,
            'casesPagination' => $cases->links('components.pagination'),
        ];

        return view('clients.client-cases', [
            'data' => $data,
            'relationships' => $relationships,
            'caseCategories' => $caseCategories,
            'abuseCategories' => $abuseCategories,
        ]);
    }

    public function showRespondents(string $uuid)
    {
        $client = $this->clientRepository->showByUuid($uuid);
        $respondentIds = $this->respondentRepository->showRespondentIdArray($client->id);
        $respondents = $this->clientRepository->showRespondents($respondentIds);
        $barangays = $this->barangayRepository->index();


        $data = (object) [
            'respondents' => $respondents,
            'barangays' => $barangays,
            'respondentsPagination' => $respondents->links('components.pagination')
        ];

        return view('clients.client-respondents', [
            'data' => $data
        ]);
    }

    public function showDependents(string $uuid)
    {
        $client = $this->clientRepository->showByUuid($uuid);
        $children = $this->childRepository->showChildrenByComplainantId($client->id);

        $data = (object) [
            'children' => $children,
            'childrenPagination' => $children->links('components.pagination'),
        ];

        return view('clients.client-children', [
            'data' => $data
        ]);
    }

    public function showByFullname(ClientFullnameRequest $request)
    {
        $user = $this->clientRepository->showByFullname($request);

        return $user;
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
