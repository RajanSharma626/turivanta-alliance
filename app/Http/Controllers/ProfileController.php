<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $application = Application::firstOrCreate(['user_id' => $user->id]);
        return view('profile', compact('user', 'application'));
    }

    public function nextStep(Request $request)
    {
        $user = Auth::user();
        $step = $request->step;

        if ($step == 1) {
            $user->update(['current_step' => 2]);
        } elseif ($step == 2) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'country_concerned' => 'required',
                'business_type' => 'required',
                'legal_status' => 'required',
                'gender' => 'required',
                'dob' => 'required|date',
                'contact_no' => 'required',
                'email' => 'required|email',
            ]);

            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->first_name . ' ' . $request->last_name,
                'country_concerned' => $request->country_concerned,
                'business_type' => $request->business_type,
                'legal_status' => $request->legal_status,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'contact_no' => $request->contact_no,
                'email' => $request->email,
                'current_step' => 3
            ]);
        } elseif ($step == 3) {
            $rules = [
                'legal_name' => 'required',
                'office_phone' => 'required',
                'office_email' => 'required|email',
                'service_tax' => 'required',
                'billing_country' => 'required',
                'shipping_country' => 'required',
                'billing_state' => 'required',
                'billing_city' => 'required',
                'shipping_city' => 'required',
                'billing_street' => 'required',
                'shipping_street' => 'required',
                'iata_registered' => 'required',
            ];

            if ($user->legal_status == 'Student') {
                $rules['admission_date'] = 'required|date';
                $rules['college_name'] = 'required';
                $rules['course_duration'] = 'required';
            } elseif ($user->legal_status == 'In Service Professional') {
                $rules['joining_industry_date'] = 'required|date|before_or_equal:' . now()->subYears(10)->toDateString();
                $rules['first_company_name'] = 'required';
                $rules['current_company_name'] = 'required';
            } else {
                $rules['commencement_date'] = 'required|date|before_or_equal:' . now()->subYears(4)->toDateString();
                $rules['trade_registration_no'] = 'required';
                $rules['registrant'] = 'required';
                $rules['registration_granted_date'] = 'required|date';
            }

            $messages = [
                'joining_industry_date.before_or_equal' => 'Date of Joining the Industry must be minimum 10 Years Old as on date.',
                'commencement_date.before_or_equal' => 'Date of Commencement of business must be minimum 4 Years Old as on date.',
            ];

            $request->validate($rules, $messages);

            // Validate and save application section
            $application = Application::where('user_id', $user->id)->first();
            $data = $request->only([
                'legal_name', 'trade_name', 'office_phone', 'office_email', 'mobile', 'website', 'fax', 'service_tax',
                'billing_country', 'billing_state', 'billing_city', 'billing_street', 'billing_postal_code',
                'shipping_country', 'shipping_state', 'shipping_city', 'shipping_street', 'shipping_postal_code',
                'breach_details', 'breach_full_name', 'breach_concerned_company', 'breach_relationship', 'breach_tax_id',
                'commencement_date', 'trade_registration_no', 'registrant', 'registration_granted_date', 'iata_no',
                'tourism_board_name', 'tourism_board_reg_no',
                'admission_date', 'college_name', 'course_duration',
                'joining_industry_date', 'first_company_name', 'current_company_name'
            ]);
            $data['same_as_billing'] = $request->has('same_as_billing');
            $data['fiduciary_breach'] = $request->fiduciary_breach == 'yes';
            $data['iata_registered'] = $request->iata_registered == 'yes';
            $data['tourism_board_registered'] = $request->tourism_board_registered == 'yes';
            $application->update($data);
            
            // Handle contacts json
            if ($request->has('contacts')) {
                $application->update(['contacts' => $request->contacts]);
            }

            $user->update(['current_step' => 4]);
        } elseif ($step == 4) {
            $application = $user->application;
            $rules = [
                'owner_ids' => 'required|array|min:1',
                'owner_ids.*' => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
                'recommendation_letter' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            ];

            if ($user->legal_status == 'In Service Professional') {
                $rules['exp_cert'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } elseif ($user->legal_status == 'Student') {
                $rules['endorsement_letter'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } else {
                $rules['trade_license'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            }

            $request->validate($rules);

            $application = $user->application;
            if (!$application) {
                return redirect()->back()->with('error', 'Application record not found.');
            }

            // Generate Application Number if not exists
            if (!$application->application_no) {
                $application->application_no = 'TA-' . date('Ymd') . rand(1000, 9999);
            }

            $application->status = 'pending';
            $docInfo = $application->uploaded_documents ?? [];
            $allUploadedFilesPaths = [];

            $fileInputs = [
                'trade_license', 'exp_cert', 'endorsement_letter', 
                'recommendation_letter', 'owner_ids'
            ];

            foreach ($fileInputs as $inputName) {
                if ($request->hasFile($inputName)) {
                    $files = is_array($request->file($inputName)) ? $request->file($inputName) : [$request->file($inputName)];
                    foreach ($files as $index => $file) {
                        if (!$file) continue;
                        
                        // Store file
                        $filename = $file->getClientOriginalName();
                        $path = $file->storeAs('applications/' . $application->application_no, $filename, 'public');
                        $fullPath = storage_path('app/public/' . $path);
                        $allUploadedFilesPaths[] = $fullPath;

                        $key = (is_array($request->file($inputName))) ? $inputName . '_' . ($index + 1) : $inputName;
                        $docInfo[$key] = [
                            'path' => $path,
                            'name' => $filename,
                            'status' => 'pending'
                        ];
                    }
                }
            }

            $application->uploaded_documents = $docInfo;
            $application->save();

            // Dispatch background job for mailing (commented out as per user request due to cron/job worker issues)
            try {
                // \App\Jobs\SendApplicationMailJob::dispatch($user, $application, $allUploadedFilesPaths);
                
                // Directly send mail instead
                /** @var \App\Models\User $user */
                $user = auth()->user();
                \Illuminate\Support\Facades\Mail::to(config('mail.doc_mail'))
                    ->send(new \App\Mail\MembershipApplicationSubmitted($user, $application, $allUploadedFilesPaths));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Direct mail send failed: ' . $e->getMessage());
            }

            $user->update(['current_step' => 5]);
            return redirect()->route('profile.index')->with('success', 'Application submitted successfully.');
        }

        return redirect()->route('profile.index');
    }

    public function backStep(Request $request)
    {
        $user = Auth::user();
        if ($user->current_step > 1) {
            $user->update(['current_step' => $user->current_step - 1]);
        }
        return redirect()->route('profile.index');
    }

    public function revoke()
    {
        $user = Auth::user();
        $application = $user->application;

        if ($application && ($application->status == 'pending' || $user->current_step == 5)) {
            $application->update(['status' => null]);
            $user->update(['current_step' => 3]); // Move back to form for editing
            return redirect()->route('profile.index')->with('success', 'Application revoked. You can now edit your details.');
        }

        return redirect()->route('profile.index')->with('error', 'Unable to revoke application.');
    }
}
