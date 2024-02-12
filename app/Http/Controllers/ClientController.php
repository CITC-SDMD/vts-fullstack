<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCaseStoreRequest;
use App\Http\Requests\ClientFullnameRequest;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\RespondentStoreRequest;
use App\Http\Requests\SearchRequest;
use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;
use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Interface\Repositories\ChildRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Interface\Repositories\RespondentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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

    private $abuseSubcategoryRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        BarangayRepositoryInterface $barangayRepository,
        CaseProfileRepositoryInterface $caseProfileRepository,
        RespondentRepositoryInterface $respondentRepository,
        ChildRepositoryInterface $childRepository,
        RelationshipRepositoryInterface $relationshipRepository,
        CaseCategoryRepositoryInterface $caseCategoryRepository,
        AbuseCategoryRepositoryInterface $abuseCategoryRepository,
        AbuseSubcategoryRepositoryInterface $abuseSubcategoryRepository
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
        $this->abuseSubcategoryRepository = $abuseSubcategoryRepository;
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
            'data' => $data,
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
        $respondentIds = $this->respondentRepository->showRespondentIdArray($client->id);
        $respondents = $this->clientRepository->showRespondentList($respondentIds);
        $relationships = $this->relationshipRepository->index();
        $caseCategories = $this->caseCategoryRepository->index();
        $abuseCategories = $this->abuseCategoryRepository->index();
        $abuseSubcategories = $this->abuseSubcategoryRepository->index();

        return view('clients.client-cases', [
            'client' => $client,
            'respondents' => $respondents,
            'cases' => $cases,
            'casesPagination' => $cases->links('components.pagination'),
            'relationships' => $relationships,
            'caseCategories' => $caseCategories,
            'abuseCategories' => $abuseCategories,
            'abuseSubcategories' => $abuseSubcategories,
        ]);
    }

    public function storeCase(ClientCaseStoreRequest $request)
    {
        if ($request->abuse_category_id) {
            foreach ($request->abuse_category_id as $abuseCategoryId) {
                if ($request->abuse_subcategory_id) {
                    foreach ($request->abuse_subcategory_id as $abuseSubcategoryId) {
                        $abuseSub = $this->abuseSubcategoryRepository->showById($abuseSubcategoryId);
                        if ($abuseSub->abuse_category_id == $abuseCategoryId) {
                            $case = $this->caseProfileRepository->showByClientIdRespondentIdAbuseCategoryIdAbuseSubcategoryId($request->complainant_id, $request->respondent_id, $abuseCategoryId, $abuseSubcategoryId);
                            if (! $case) {
                                $this->caseProfileRepository->store($request, $abuseCategoryId, $abuseSubcategoryId);
                            }
                        }
                    }
                } else {
                    $case = $this->caseProfileRepository->showByComplainantIdRespondentIdAbuseCategoryId($request->complainant_id, $request->respondent_id, $abuseCategoryId);
                    if (! $case) {
                        $this->caseProfileRepository->store($request, $abuseCategoryId);
                    }
                }
            }
        } else {
            $case = $this->caseProfileRepository->showByComplainantIdRespondentIdCaseCategoryId($request->complainant_id, $request->respondent_id, $request->case_category_id);
            if (! $case) {
                $this->caseProfileRepository->store($request);
            }
        }

        return back();
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
            'respondentsPagination' => $respondents->links('components.pagination'),
        ];

        return view('clients.client-respondents', [
            'data' => $data,
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
            'data' => $data,
        ]);
    }

    public function showByFullname(ClientFullnameRequest $request)
    {
        $user = $this->clientRepository->showByFullname($request);

        return $user;
    }

    public function upload(Request $request, string $uuid)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'image', 'mimes:jpeg,png,gif,webp', 'max:5120'],
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->messages()->first('file'));

            return back();
        }

        $this->clientRepository->uploadMedia($request, $uuid);

        Alert::success('Success', 'Signature uploaded successfully.');

        return back();
    }

    public function download(string $uuid)
    {
        $client = $this->clientRepository->showByUuid($uuid);
        $filePath = 'vts/client/'.$client->file;

        return Storage::download($filePath);
    }
}
