<?php

namespace App\Repositories;

use App\Interface\Repositories\ClientRepositoryInterface;
use App\Models\Client;
use Carbon\Carbon;
use Faker\Core\Uuid;
use Illuminate\Support\Facades\DB;
use illuminate\Support\Str;

class ClientRepository implements ClientRepositoryInterface
{
    public function index()
    {
        return Client::with(['barangay'])
            ->orderBy('id', 'desc')
            ->paginate(config('pagination.paginate'));
    }

    public function showAllClient()
    {
        return Client::all();
    }

    public function clientPerMonth()
    {
        return Client::selectRaw('COUNT(*) as total_clients')
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total_clients')
            ->toArray();
    }

    public function clientCount()
    {
        $currentYear = Carbon::now()->year;

        return Client::whereYear('created_at', $currentYear)->count();
    }

    public function search(object $payload)
    {
        return Client::with(['barangay'])
            ->where(function ($query) use ($payload) {
                $query->where('firstname', 'LIKE', "%$payload->search%")
                    ->orWhere('middlename', 'LIKE', "%$payload->search%")
                    ->orWhere('lastname', 'LIKE', "%$payload->search%");
            })
            ->orWhereHas('barangay', function ($query) use ($payload) {
                $query->where('brgy_code', 'LIKE', "%$payload->search%")
                    ->orWhere('brgy_name', 'LIKE', "%$payload->search%");
            })
            ->orderBy('id', 'desc')
            ->paginate(config('pagination.paginate'));
    }

    public function create(object $payload)
    {
        $client = new Client();
        $client->barangay_id = $payload->barangay_id;
        $client->firstname = $payload->firstname;
        $client->middlename = $payload->middlename;
        $client->lastname = $payload->lastname;
        $client->contact_no = $payload->contact_no;
        $client->birthdate = $payload->birthdate;
        $client->sex = $payload->sex;
        $client->age = $payload->age;
        $client->civil_status = $payload->civil_status;
        $client->educ_attain = $payload->educ_attain;
        $client->home_address = $payload->home_address;
        $client->work_address = $payload->work_address;
        $client->occupation = $payload->occupation;
        $client->ethnicity = $payload->ethnicity;
        $client->is_4ps_beneficiary = $payload->is_4ps_beneficiary;
        $client->save();

        return $client->fresh();
    }

    public function showRespondents($respondentIds)
    {
        return Client::whereIn('id', $respondentIds)
            ->paginate(config('pagination.shortPage'));
    }

    public function showRespondentList($respondentIds)
    {
        return Client::whereIn('id', $respondentIds)
            ->get();
    }

    public function showByUuid(string $uuid)
    {
        return Client::with(['barangay', 'respondents', 'respondents.respondent'])
            ->where('uuid', $uuid)
            ->first();
    }

    public function showByFullname(object $payload)
    {
        return Client::where('firstname', $payload->firstname)
            ->where('middlename', $payload->middlename)
            ->where('lastname', $payload->lastname)
            ->first();
    }

    public function update(object $payload, string $uuid)
    {
        $client = Client::where('uuid', $uuid)->first();
        $client->barangay_id = $payload->barangay_id;
        $client->firstname = $payload->firstname;
        $client->middlename = $payload->middlename;
        $client->lastname = $payload->lastname;
        $client->contact_no = $payload->contact_no;
        $client->birthdate = $payload->birthdate;
        $client->sex = $payload->sex;
        $client->age = $payload->age;
        $client->civil_status = $payload->civil_status;
        $client->educ_attain = $payload->educ_attain;
        $client->home_address = $payload->home_address;
        $client->work_address = $payload->work_address;
        $client->occupation = $payload->occupation;
        $client->ethnicity = $payload->ethnicity;
        $client->is_4ps_beneficiary = $payload->is_4ps_beneficiary;
        $client->save();

        return $client->fresh();
    }

    public function uploadMedia(object $payload, string $uuid)
    {
        $client = Client::where('uuid', $uuid)->first();
        if ($payload->file) {
            $client->addMediaFromRequest('file')->toMediaCollection('clientMedia');
        }
        $filePath = $client->getMedia('clientMedia')->last()->getPath();
        $appPath = Str::after($filePath, 'client/');
        $client->file = $appPath;
        $client->save();

        return $client->fresh();
    }
}
