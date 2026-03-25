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
                'trade_name' => 'required',
                'office_phone' => 'required',
                'office_email' => 'required|email',
                'billing_country' => 'required',
                'billing_city' => 'required',
                'billing_street' => 'required',
            ]);
            
            // Validate and save application section
            $application = Application::where('user_id', $user->id)->first();
            $application->update($request->only([
                'legal_name', 'trade_name', 'office_phone', 'office_email', 'website', 'service_tax',
                'billing_country', 'billing_state', 'billing_city', 'billing_street', 'billing_postal_code',
                'same_as_billing', 'shipping_country', 'shipping_state', 'shipping_city', 'shipping_street', 'shipping_postal_code',
                'fiduciary_breach', 'breach_details', 'commencement_date', 'trade_registration_no', 'registration_granted_date', 'iata_registered'
            ]));
            
            // Handle contacts json
            if ($request->has('contacts')) {
                $application->update(['contacts' => $request->contacts]);
            }

            $user->update(['current_step' => 4]);
        } elseif ($step == 4) {
            $rules = [
                'tax_proof' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'tax_receipt' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
                'owner_ids' => 'required|array|min:1',
                'owner_ids.*' => 'file|mimes:pdf,jpg,jpeg,png|max:5120',
            ];

            if (in_array($user->legal_status, ['Corporation', 'Limited Company'])) {
                $rules['cert_inc'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['art_mem'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['annual_return'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['ca_letter_share'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
            } elseif (in_array($user->legal_status, ['Limited Partnership', 'Partnership', 'Joint Venture'])) {
                $rules['partnership_deed'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
                $rules['ca_letter_part'] = 'required|file|mimes:pdf,jpg,jpeg,png|max:5120';
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
                $application->application_no = 'TA-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(4));
            }

            $docs = $application->uploaded_documents ?? [];

// Debug: log received files for troubleshooting
// \Illuminate\Support\Facades\Log::info('Document upload attempt', ['files' => $request->allFiles()]);

// Collect files without storing
$allUploadedFiles = [];
$docInfo = [];

$fileInputs = [
    'cert_inc', 'art_mem', 'annual_return', 'ca_letter_share',
    'partnership_deed', 'ca_letter_part', 'trade_license',
    'tax_proof', 'tax_receipt', 'owner_ids'
];

foreach ($fileInputs as $inputName) {
    if ($request->hasFile($inputName)) {
        $files = is_array($request->file($inputName)) ? $request->file($inputName) : [$request->file($inputName)];
        foreach ($files as $index => $file) {
            if (!$file) continue;
            $allUploadedFiles[] = $file;
            if (is_array($request->file($inputName))) {
                $docInfo[$inputName . '_' . ($index + 1)] = $file->getClientOriginalName() . ' (Not stored)';
            } else {
                $docInfo[$inputName] = $file->getClientOriginalName() . ' (Not stored)';
            }
        }
    }
}

$application->uploaded_documents = $docInfo;
$application->status = 'pending';
$application->save();

            // Mark completed BEFORE sending email to avoid timeout issues
            $user->update(['current_step' => 5]);

            // Send Email
            try {
                /** @var \App\Models\User $currentUser */
                $currentUser = auth()->user();
                \Illuminate\Support\Facades\Mail::to(config('mail.doc_mail'))->send(new \App\Mail\MembershipApplicationSubmitted($currentUser, $application, $allUploadedFiles));
            } catch (\Exception $e) {
                // Log and continue
                \Illuminate\Support\Facades\Log::error('Mail failed: ' . $e->getMessage());
            }
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
