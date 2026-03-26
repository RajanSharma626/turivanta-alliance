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
            $request->validate([
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
                'commencement_date' => 'required|date',
                'trade_registration_no' => 'required',
                'registrant' => 'required',
                'registration_granted_date' => 'required|date',
                'iata_registered' => 'required',
            ]);
            
            // Validate and save application section
            $application = Application::where('user_id', $user->id)->first();
            $data = $request->only([
                'legal_name', 'trade_name', 'office_phone', 'office_email', 'mobile', 'website', 'fax', 'service_tax',
                'billing_country', 'billing_state', 'billing_city', 'billing_street', 'billing_postal_code',
                'shipping_country', 'shipping_state', 'shipping_city', 'shipping_street', 'shipping_postal_code',
                'breach_details', 'breach_full_name', 'breach_concerned_company', 'breach_relationship', 'breach_tax_id',
                'commencement_date', 'trade_registration_no', 'registrant', 'registration_granted_date', 'iata_no',
                'tourism_board_name', 'tourism_board_reg_no'
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
                'tax_proof' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'tax_receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'owner_ids' => 'required|array|min:1',
                'owner_ids.*' => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
                'recommendation_letter' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            ];

            if ($application->iata_registered) {
                $rules['iata_cert'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            }

            if (in_array($user->legal_status, ['Corporation', 'Limited Company'])) {
                $rules['cert_inc'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['art_mem'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['annual_return'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['ca_letter_share'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } elseif (in_array($user->legal_status, ['Limited Partnership', 'Partnership', 'Joint Venture'])) {
                $rules['partnership_deed'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['ca_letter_part'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['summary_form'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } elseif (in_array($user->legal_status, ['Co-operative', 'Association', 'State Owned Enterprise'])) {
                $rules['registration_cert'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['bye_laws'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } elseif ($user->legal_status == 'In Service Professional') {
                $rules['exp_cert'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } elseif ($user->legal_status == 'Student') {
                $rules['endorsement_letter'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } else {
                $rules['trade_license'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                if ($user->legal_status == 'Trust Company') {
                    $rules['trust_deed'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                }
            }

            $request->validate($rules);

            $application = $user->application;
            if (!$application) {
                return redirect()->back()->with('error', 'Application record not found.');
            }

            // Generate Application Number if not exists
            if (!$application->application_no) {
                $application->application_no = 'TA-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(4));
            }

            $application->status = 'pending';
            $docInfo = $application->uploaded_documents ?? [];
            $allUploadedFilesPaths = [];

            $fileInputs = [
                'cert_inc', 'art_mem', 'annual_return', 'ca_letter_share',
                'partnership_deed', 'ca_letter_part', 'summary_form', 'trade_license', 'trust_deed',
                'registration_cert', 'bye_laws',
                'exp_cert', 'endorsement_letter', 'recommendation_letter', 'iata_cert',
                'tax_proof', 'tax_receipt', 'owner_ids'
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
}
