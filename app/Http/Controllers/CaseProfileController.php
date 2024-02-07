<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\CaseProfileRepositoryInterface;
use Illuminate\Http\Request;

class CaseProfileController extends Controller
{
    private $caseProfileRepository;

    public function __construct(CaseProfileRepositoryInterface $caseProfileRepository)
    {
        $this->middleware('auth');
        $this->caseProfileRepository = $caseProfileRepository;
    }

    public function index()
    {
        $cases = $this->caseProfileRepository->index();

        return view('pages.cases', [
            'cases' => $cases,
            'casesPagination' => $cases->links('components.pagination'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
