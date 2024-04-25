<?php

namespace App\Imports;

use App\Models\AbuseCategory;
use App\Models\AbuseSubcategory;
use App\Models\Barangay;
use App\Models\CaseCategory;
use App\Models\CaseLog;
use App\Models\CaseProfile;
use App\Models\Client;
use App\Models\Occupation;
use App\Models\ReferralAgency;
use App\Models\Relationship;
use App\Models\Respondent;
use App\Models\Service;
use App\Models\Suboccupation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class CaseImport implements ToCollection, WithHeadingRow
{
    /**
     * @param  Collection  $collection
     */
    public function collection(Collection $rows)
    {
        try {
            DB::transaction();
            $user = User::findOrFail(auth()->user()->id);
            foreach ($rows as $row) {
                $client = Client::where('firstname', trim($row['client_firstname']))
                    ->where('middlename', trim($row['client_middlename']))
                    ->where('lastname', trim($row['client_lastname']))
                    ->first();

                $respondent = Client::where('firstname', trim($row['client_firstname']))
                    ->where('middlename', trim($row['client_middlename']))
                    ->where('lastname', trim($row['client_lastname']))
                    ->first();

                if ($client && $respondent) {
                    $caseCategory = CaseCategory::where('category_name', trim($row['case_category']))->first();
                    $abuseCategory = AbuseCategory::where('abuse_type', trim($row['abuse_category']))->first();
                    $abuseSubcategory = AbuseSubcategory::where('type', trim($row['abuse_subcategory']))->first();
                    $relationship = Relationship::where('relationship_type', trim($row['relationship']))->first();

                    $caseProfile = CaseProfile::create([
                        'case_category_id' => $caseCategory->id,
                        'abuse_category_id' => $abuseCategory->id ?? null,
                        'abuse_subcategory_id' => $abuseSubcategory->id ?? null,
                        'complainant_id' => $client->id,
                        'respondent_id' => $respondent->id,
                        'received_by_id' => $user->id,
                        'relationship_id' => $relationship->id,
                        'envelope_number' => $row['envelope_number'] ?? null,
                        'created_at' => Carbon::parse($row['case_date'])->format('yyyy-mm-dd'),
                    ]);

                    $agency = ReferralAgency::where('agency_name', trim($row['referred_to']))->first();
                    $service = Service::where('service_type', $row['assistance_provided'])->first();

                    CaseLog::create([
                        'case_profile_id' => $caseProfile->id,
                        'referred_by_id' => $user->agency_id,
                        'referral_agency_id' => $agency->id,
                        'service_id' => $service->id,
                    ]);
                } elseif ($client && ! $respondent) {
                    $respondentBarangay = Barangay::where('brgy_name', trim($row['respondent_barangay']))->first();
                    if (isset($row['respondent_occupation'])) {
                        $respondentOccupation = Occupation::where('name', trim($row['respondent_occupation']))->first();
                    }
                    if (isset($row['respondent_sub_occupation'])) {
                        $respondentSubOccupation = Suboccupation::where('name', trim($row['respondent_sub_occupation']))->first();
                    }

                    $respondent = Client::create([
                        'barangay_id' => $respondentBarangay->id,
                        'firstname' => trim($row['respondent_firstname']),
                        'middlename' => trim($row['respondent_middlename']),
                        'lastname' => trim($row['respondent_lastname']),
                        'contact_no' => trim($row['respondent_contact_no']) ?? null,
                        'birthdate' => trim($row['respondent_birthdate']) ?? null,
                        'sex' => trim($row['respondent_sex']),
                        'age' => trim($row['respondent_age']) ?? null,
                        'civil_status' => trim($row['respondent_civil_status']) ?? null,
                        'educ_attain' => trim($row['respondent_educ_attain']) ?? null,
                        'home_address' => trim($row['respondent_address']),
                        'work_address' => trim($row['respondent_work_address']),
                        'occupation_id' => $respondentOccupation->id ?? null,
                        'suboccupation_id' => $respondentSubOccupation->id ?? null,
                        'ethnicity' => trim($row['respondent_ethnicity']),
                        'is_4ps_beneficiary' => trim($row['respondent_4ps']),
                    ]);

                    Respondent::create([
                        'complainant_id' => $client->id,
                        'respondent_id' => $respondent->id,
                    ]);

                    $caseCategory = CaseCategory::where('category_name', trim($row['case_category']))->first();
                    $abuseCategory = AbuseCategory::where('abuse_type', trim($row['abuse_category']))->first();
                    $abuseSubcategory = AbuseSubcategory::where('type', trim($row['abuse_subcategory']))->first();
                    $relationship = Relationship::where('relationship_type', trim($row['relationship']))->first();

                    $caseProfile = CaseProfile::create([
                        'case_category_id' => $caseCategory->id,
                        'abuse_category_id' => $abuseCategory->id ?? null,
                        'abuse_subcategory_id' => $abuseSubcategory->id ?? null,
                        'complainant_id' => $client->id,
                        'respondent_id' => $respondent->id,
                        'received_by_id' => $user->id,
                        'relationship_id' => $relationship->id,
                        'envelope_number' => $row['envelope_number'] ?? null,
                        'created_at' => Carbon::parse($row['case_date'])->format('yyyy-mm-dd'),
                    ]);

                    $agency = ReferralAgency::where('agency_name', trim($row['referred_to']))->first();
                    $service = Service::where('service_type', $row['assistance_provided'])->first();

                    CaseLog::create([
                        'case_profile_id' => $caseProfile->id,
                        'referred_by_id' => $user->agency_id,
                        'referral_agency_id' => $agency->id,
                        'service_id' => $service->id,
                    ]);
                } else {
                    $clientBarangay = Barangay::where('brgy_name', trim($row['client_barangay']))->first();
                    if (isset($row['client_occupation'])) {
                        $clientOccupation = Occupation::where('name', trim($row['client_occupation']))->first();
                    }
                    if (isset($row['client_sub_occupation'])) {
                        $clientSubOccupation = Suboccupation::where('name', trim($row['client_sub_occupation']))->first();
                    }

                    $client = Client::create([
                        'barangay_id' => $clientBarangay->id,
                        'firstname' => trim($row['client_firstname']),
                        'middlename' => trim($row['client_middlename']),
                        'lastname' => trim($row['client_lastname']),
                        'contact_no' => trim($row['client_contact_no']) ?? null,
                        'birthdate' => trim($row['client_birthdate']) ?? null,
                        'sex' => trim($row['client_sex']),
                        'age' => trim($row['client_age']) ?? null,
                        'civil_status' => trim($row['client_civil_status']) ?? null,
                        'educ_attain' => trim($row['client_educ_attain']) ?? null,
                        'home_address' => trim($row['client_address']),
                        'work_address' => trim($row['client_work_address']),
                        'occupation_id' => $clientOccupation->id ?? null,
                        'suboccupation_id' => $clientSubOccupation->id ?? null,
                        'ethnicity' => trim($row['client_ethnicity']),
                        'is_4ps_beneficiary' => trim($row['client_4ps']),
                    ]);

                    $respondentBarangay = Barangay::where('brgy_name', trim($row['respondent_barangay']))->first();
                    if (isset($row['respondent_occupation'])) {
                        $respondentOccupation = Occupation::where('name', trim($row['respondent_occupation']))->first();
                    }
                    if (isset($row['respondent_sub_occupation'])) {
                        $respondentSubOccupation = Suboccupation::where('name', trim($row['respondent_sub_occupation']))->first();
                    }

                    $respondent = Client::create([
                        'barangay_id' => $respondentBarangay->id,
                        'firstname' => trim($row['respondent_firstname']),
                        'middlename' => trim($row['respondent_middlename']),
                        'lastname' => trim($row['respondent_lastname']),
                        'contact_no' => trim($row['respondent_contact_no']) ?? null,
                        'birthdate' => trim($row['respondent_birthdate']) ?? null,
                        'sex' => trim($row['respondent_sex']),
                        'age' => trim($row['respondent_age']) ?? null,
                        'civil_status' => trim($row['respondent_civil_status']) ?? null,
                        'educ_attain' => trim($row['respondent_educ_attain']) ?? null,
                        'home_address' => trim($row['respondent_address']),
                        'work_address' => trim($row['respondent_work_address']),
                        'occupation_id' => $respondentOccupation->id ?? null,
                        'suboccupation_id' => $respondentSubOccupation->id ?? null,
                        'ethnicity' => trim($row['respondent_ethnicity']),
                        'is_4ps_beneficiary' => trim($row['respondent_4ps']),
                    ]);

                    Respondent::create([
                        'complainant_id' => $client->id,
                        'respondent_id' => $respondent->id,
                    ]);

                    $caseCategory = CaseCategory::where('category_name', trim($row['case_category']))->first();
                    $abuseCategory = AbuseCategory::where('abuse_type', trim($row['abuse_category']))->first();
                    $abuseSubcategory = AbuseSubcategory::where('type', trim($row['abuse_subcategory']))->first();
                    $relationship = Relationship::where('relationship_type', trim($row['relationship']))->first();

                    $caseProfile = CaseProfile::create([
                        'case_category_id' => $caseCategory->id,
                        'abuse_category_id' => $abuseCategory->id ?? null,
                        'abuse_subcategory_id' => $abuseSubcategory->id ?? null,
                        'complainant_id' => $client->id,
                        'respondent_id' => $respondent->id,
                        'received_by_id' => $user->id,
                        'relationship_id' => $relationship->id,
                        'envelope_number' => $row['envelope_number'] ?? null,
                        'created_at' => Carbon::parse($row['case_date'])->format('yyyy-mm-dd'),
                    ]);

                    $agency = ReferralAgency::where('agency_name', trim($row['referred_to']))->first();
                    $service = Service::where('service_type', $row['assistance_provided'])->first();

                    CaseLog::create([
                        'case_profile_id' => $caseProfile->id,
                        'referred_by_id' => $user->agency_id,
                        'referral_agency_id' => $agency->id,
                        'service_id' => $service->id,
                    ]);
                }
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }
    }
}
