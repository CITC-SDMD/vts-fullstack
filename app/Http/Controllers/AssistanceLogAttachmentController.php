<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AssistanceLogAttachmentRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AssistanceLogAttachmentController extends Controller
{
    private $assistanceLogAttachmentRepository;

    public function __construct(AssistanceLogAttachmentRepositoryInterface $assistanceLogAttachmentRepository)
    {
        $this->middleware('auth');
        $this->assistanceLogAttachmentRepository = $assistanceLogAttachmentRepository;
    }

    public function download(string $uuid)
    {
        $file = $this->assistanceLogAttachmentRepository->showByUuid($uuid);
        $filePath = 'vts/files/'.$file->file;

        return Storage::download($filePath);
    }

    public function delete(string $uuid)
    {
        $this->assistanceLogAttachmentRepository->delete($uuid);

        Alert::success('Success', 'Attachment successfully deleted.');

        return back();
    }
}
