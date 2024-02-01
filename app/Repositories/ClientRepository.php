<?php

namespace App\Repositories;

use App\Interface\Repositories\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    public function index()
    {
        return Client::paginate(config('pagination.paginate'));
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

    public function showById(int $clientId)
    {
        return Client::findOrFail($clientId);
    }

    public function showByFullname(object $payload)
    {
        return Client::where('firstname', $payload->firstname)
            ->where('middlename', $payload->middlename)
            ->where('lastname', $payload->lastname)
            ->first();
    }

    public function update(object $payload, int $clientId)
    {
        $client = Client::findOrFail($clientId);
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
}
