<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientFullnameRequest;
use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Interface\Repositories\ClientRepositoryInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $clientRepository;

    private $barangayRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository,
        BarangayRepositoryInterface $barangayRepository
    ) {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
        $this->barangayRepository = $barangayRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->index();
        $barangays = $this->barangayRepository->index();

        $data = (object) [
            'clients' => $clients,
            'barangays' => $barangays,
            'pagination' => $clients->links('components.pagination')
        ];

        return view('pages.clients', [
            'data' => $data
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
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
