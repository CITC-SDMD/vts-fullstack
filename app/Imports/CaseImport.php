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
use Illuminate\Support\Facades\Log;
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
            DB::beginTransaction();
            $user = User::findOrFail(auth()->user()->id);

            $currentTimestamp = now();
            $year = $currentTimestamp->year;
            $month = $currentTimestamp->month;
            $day = $currentTimestamp->day;
            $millisecond = $currentTimestamp->millisecond;
            $caseNumber = $year.$month.$day.$millisecond;
            $caseLogNumber = $year.$month.$day.$millisecond;

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

                    $caseProfile = new CaseProfile();
                    $caseProfile->case_category_id = $caseCategory->id;
                    $caseProfile->abuse_category_id = $abuseCategory->id ?? null;
                    $caseProfile->abuse_subcategory_id = $abuseSubcategory->id ?? null;
                    $caseProfile->complainant_id = $client->id;
                    $caseProfile->respondent_id = $respondent->id;
                    $caseProfile->received_by_id = $user->id;
                    $caseProfile->relationship_id = $relationship->id;
                    $caseProfile->case_profile_id = 'CASE #'.$caseNumber;
                    $caseProfile->envelope_number = isset($row['envelope_number']) ? $row['envelope_number'] : null;
                    $caseProfile->created_at = Carbon::parse($row['case_date'])->format('Y-m-d');
                    $caseProfile->save();

                    $agency = ReferralAgency::where('agency_name', trim($row['referred_to']))->first();
                    $service = Service::where('service_type', $row['assistance_provided'])->first();

                    $caseLog = new CaseLog();
                    $caseLog->case_profile_id = $caseProfile->id;
                    $caseLog->referred_by_id = $user->agency_id;
                    $caseLog->referral_agency_id = $agency->id;
                    $caseLog->service_id = $service->id;
                    $caseLog->case_log_number = 'CASELOG #'.$caseLogNumber;
                    $caseLog->save();
                } elseif ($client && ! $respondent) {
                    $respondentBarangay = Barangay::where('brgy_name', $row['respondent_barangay'])->first();
                    if (isset($row['respondent_occupation'])) {
                        $respondentOccupation = Occupation::where('name', trim($row['respondent_occupation']))->first();
                    }
                    if (isset($row['respondent_sub_occupation'])) {
                        $respondentSubOccupation = Suboccupation::where('name', trim($row['respondent_sub_occupation']))->first();
                    }

                    $respondent = new Client();
                    $respondent->barangay_id = $respondentBarangay->id;
                    $respondent->firstname = trim($row['respondent_firstname']);
                    $respondent->middlename = trim($row['respondent_middlename']);
                    $respondent->lastname = trim($row['respondent_lastname']);
                    $respondent->contact_no = isset($row['respondent_contact_no']) ? trim($row['respondent_contact_no']) : null;
                    $respondent->birthdate = isset($row['respondent_birthdate']) ? Carbon::parse(trim($row['respondent_birthdate']))->format('Y-m-d') : null;
                    $respondent->sex = trim($row['respondent_sex']);
                    $respondent->age = isset($row['respondent_age']) ? trim($row['respondent_age']) : null;
                    $respondent->civil_status = trim($row['respondent_civil_status']);
                    $respondent->educ_attain = isset($row['respondent_educ_attain']) ? trim($row['respondent_educ_attain']) : null;
                    $respondent->home_address = trim($row['respondent_address']);
                    $respondent->work_address = isset($row['respondent_work_address']) ? trim($row['respondent_work_address']) : null;
                    $respondent->occupation_id = $respondentOccupation->id ?? null;
                    $respondent->suboccupation_id = $respondentSubOccupation->id ?? null;
                    $respondent->ethnicity = isset($row['respondent_ethnicity']) ? trim($row['respondent_ethnicity']) : null;
                    $respondent->is_4ps_beneficiary = isset($row['respondent_4ps']) ? trim($row['respondent_4ps']) : null;
                    $respondent->save();

                    $respondents = new Respondent();
                    $respondents->complainant_id = $client->id;
                    $respondents->respondent_id = $respondent->id;
                    $respondents->save();

                    $caseCategory = CaseCategory::where('category_name', trim($row['case_category']))->first();
                    $abuseCategory = AbuseCategory::where('abuse_type', trim($row['abuse_category']))->first();
                    $abuseSubcategory = AbuseSubcategory::where('type', trim($row['abuse_subcategory']))->first();
                    $relationship = Relationship::where('relationship_type', trim($row['relationship']))->first();

                    $caseProfile = new CaseProfile();
                    $caseProfile->case_category_id = $caseCategory->id;
                    $caseProfile->abuse_category_id = $abuseCategory->id ?? null;
                    $caseProfile->abuse_subcategory_id = $abuseSubcategory->id ?? null;
                    $caseProfile->complainant_id = $client->id;
                    $caseProfile->respondent_id = $respondent->id;
                    $caseProfile->received_by_id = $user->id;
                    $caseProfile->relationship_id = $relationship->id;
                    $caseProfile->case_profile_id = 'CASE #'.$caseNumber;
                    $caseProfile->envelope_number = isset($row['envelope_number']) ? trim($row['envelope_number']) : null;
                    $caseProfile->created_at = Carbon::parse($row['case_date'])->format('Y-m-d');
                    $caseProfile->save();

                    $agency = ReferralAgency::where('agency_name', trim($row['referred_to']))->first();
                    $service = Service::where('service_type', $row['assistance_provided'])->first();

                    $caseLog = new CaseLog();
                    $caseLog->case_profile_id = $caseProfile->id;
                    $caseLog->referred_by_id = $user->agency_id;
                    $caseLog->referral_agency_id = $agency->id;
                    $caseLog->service_id = $service->id;
                    $caseLog->case_log_number = 'CASELOG #'.$caseLogNumber;
                    $caseLog->save();
                } else {
                    $clientBarangay = Barangay::where('brgy_name', $row['client_barangay'])->first();
                    if (isset($row['client_occupation'])) {
                        $clientOccupation = Occupation::where('name', trim($row['client_occupation']))->first();
                    }
                    if (isset($row['client_sub_occupation'])) {
                        $clientSubOccupation = Suboccupation::where('name', trim($row['client_sub_occupation']))->first();
                    }

                    $client = new Client();
                    $client->barangay_id = $clientBarangay->id;
                    $client->firstname = trim($row['client_firstname']);
                    $client->middlename = trim($row['client_middlename']);
                    $client->lastname = trim($row['client_lastname']);
                    $client->contact_no = isset($row['client_contact_no']) ? trim($row['client_contact_no']) : null;
                    $client->birthdate = isset($row['client_birthdate']) ? Carbon::parse(trim($row['client_birthdate']))->format('Y-m-d') : null;
                    $client->sex = trim($row['client_sex']);
                    $client->age = isset($row['client_age']) ? trim($row['client_age']) : null;
                    $client->civil_status = trim($row['client_civil_status']);
                    $client->educ_attain = isset($row['client_educ_attain']) ? trim($row['client_educ_attain']) : null;
                    $client->home_address = trim($row['client_address']);
                    $client->work_address = isset($row['client_work_address']) ? trim($row['client_work_address']) : null;
                    $client->occupation_id = $clientOccupation->id ?? null;
                    $client->suboccupation_id = $clientSubOccupation->id ?? null;
                    $client->ethnicity = isset($row['client_ethnicity']) ? trim($row['client_ethnicity']) : null;
                    $client->is_4ps_beneficiary = isset($row['client_4ps']) ? trim($row['client_4ps']) : null;
                    $client->save();

                    $respondentBarangay = Barangay::where('brgy_name', $row['respondent_barangay'])->first();
                    if (isset($row['respondent_occupation'])) {
                        $respondentOccupation = Occupation::where('name', trim($row['respondent_occupation']))->first();
                    }
                    if (isset($row['respondent_sub_occupation'])) {
                        $respondentSubOccupation = Suboccupation::where('name', trim($row['respondent_sub_occupation']))->first();
                    }

                    $respondent = new Client();
                    $respondent->barangay_id = $respondentBarangay->id;
                    $respondent->firstname = trim($row['respondent_firstname']);
                    $respondent->middlename = trim($row['respondent_middlename']);
                    $respondent->lastname = trim($row['respondent_lastname']);
                    $respondent->contact_no = isset($row['respondent_contact_no']) ? trim($row['respondent_contact_no']) : null;
                    $respondent->birthdate = isset($row['respondent_birthdate']) ? Carbon::parse(trim($row['respondent_birthdate']))->format('Y-m-d') : null;
                    $respondent->sex = trim($row['respondent_sex']);
                    $respondent->age = isset($row['respondent_age']) ? trim($row['respondent_age']) : null;
                    $respondent->civil_status = trim($row['respondent_civil_status']);
                    $respondent->educ_attain = isset($row['respondent_educ_attain']) ? trim($row['respondent_educ_attain']) : null;
                    $respondent->home_address = trim($row['respondent_address']);
                    $respondent->work_address = isset($row['respondent_work_address']) ? trim($row['respondent_work_address']) : null;
                    $respondent->occupation_id = $respondentOccupation->id ?? null;
                    $respondent->suboccupation_id = $respondentSubOccupation->id ?? null;
                    $respondent->ethnicity = isset($row['respondent_ethnicity']) ? trim($row['respondent_ethnicity']) : null;
                    $respondent->is_4ps_beneficiary = isset($row['respondent_4ps']) ? trim($row['respondent_4ps']) : null;
                    $respondent->save();

                    $respondents = new Respondent();
                    $respondents->complainant_id = $client->id;
                    $respondents->respondent_id = $respondent->id;
                    $respondents->save();

                    $caseCategory = CaseCategory::where('category_name', trim($row['case_category']))->first();
                    $abuseCategory = AbuseCategory::where('abuse_type', trim($row['abuse_category']))->first();
                    $abuseSubcategory = AbuseSubcategory::where('type', trim($row['abuse_subcategory']))->first();
                    $relationship = Relationship::where('relationship_type', trim($row['relationship']))->first();

                    $caseProfile = new CaseProfile();
                    $caseProfile->case_category_id = $caseCategory->id;
                    $caseProfile->abuse_category_id = $abuseCategory->id ?? null;
                    $caseProfile->abuse_subcategory_id = $abuseSubcategory->id ?? null;
                    $caseProfile->complainant_id = $client->id;
                    $caseProfile->respondent_id = $respondent->id;
                    $caseProfile->received_by_id = $user->id;
                    $caseProfile->relationship_id = $relationship->id;
                    $caseProfile->case_profile_id = 'CASE #'.$caseNumber;
                    $caseProfile->envelope_number = isset($row['envelope_number']) ? $row['envelope_number'] : null;
                    $caseProfile->created_at = Carbon::parse($row['case_date'])->format('Y-m-d');
                    $caseProfile->save();

                    $agency = ReferralAgency::where('agency_name', trim($row['referred_to']))->first();
                    $service = Service::where('service_type', $row['assistance_provided'])->first();

                    $caseLog = new CaseLog();
                    $caseLog->case_profile_id = $caseProfile->id;
                    $caseLog->referred_by_id = $user->agency_id;
                    $caseLog->referral_agency_id = $agency->id;
                    $caseLog->service_id = $service->id;
                    $caseLog->case_log_number = 'CASELOG #'.$caseLogNumber;
                    $caseLog->save();
                }
            }
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::debug($e);
        }
    }
}
