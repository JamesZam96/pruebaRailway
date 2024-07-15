<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\DeliveryModel;
use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //

    public function showRegistrationFormCustomer()
    {
        return view('auth.customer_register');
    }

    public function showRegistrationFormCompany()
    {
        return view('auth.company_register');
    }

    public function showRegistrationFormDelivery()
    {
        return view('auth.delivery_register');
    }

    public function createCustomer(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $customerRole = RoleModel::where('name', 'customer')->first();
        $user->roles()->attach($customerRole);
        Auth::login($user);
        
        return redirect()->route('home.customer')->with('status', 'Usuario registrado correctamente');

    }
    
    public function createCompany(Request $request){

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $pdfStr = $request->file('pdf_single_tax_registry');
        $str = 'pdf_'.Str::uuid().".".$pdfStr->guessExtension();
        $strPath = $pdfStr->storeAs('uploads/pdfs', $str, 'public');
        
        $pdfBc = $request->file('pdf_bank_certificate');    
        $bc = "pdf_".Str::uuid().".".$pdfBc->guessExtension();
        $bcPath = $pdfBc->storeAs('uploads/pdfs', $bc, 'public');

        $pdfLrd = $request->file('pdf_legal_representative_dni');
        $lrd = "pdf_".Str::uuid().".".$pdfLrd->guessExtension();
        $lrdPath = $pdfLrd->storeAs('uploads/pdfs', $lrd, 'public');

        $terms_and_conditions = $request->has('terms_and_conditions') ? true : false;
        $processing_of_personal_data = $request->has('processing_of_personal_data') ? true : false;

        CompanyModel::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'legal_representative_name' => $request->legal_representative_name,
            'legal_representative_lastname' => $request->legal_representative_lastname,
            'legal_representative_dni' => $request->legal_representative_dni,
            'nit' => $request->nit,
            'person_type' => $request->person_type,
            'legal_representative_email' => $request->legal_representative_email,
            'legal_name_company' => $request->legal_name_company,

            'terms_and_conditions' => $terms_and_conditions,
            'processing_of_personal_data' => $processing_of_personal_data,

            'pdf_single_tax_registry' => $strPath,
            'pdf_bank_certificate' => $bcPath,
            'pdf_legal_representative_dni' => $lrdPath,

            'account_holder_name' => $request->account_holder_name,
            'account_holder_lastname' => $request->account_holder_lastname,
            'bank_name' => $request->bank_name,
            'account_type' => $request->account_type,
            'account_number' => $request->account_number,
            'billing_address' => $request->billing_address,
            'billing_contact_phone_number' => $request->billing_contact_phone_number,
            'billing_contact_email' => $request->billing_contact_email
        ]);

        $companyRole = RoleModel::where('name', 'company')->first();
        $user->roles()->attach($companyRole);
        Auth::login($user);
        return redirect()->route('home.company');
    }

    public function createDelivery(Request $request){
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'country' => $request->country,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        //Auth::login($user);

        // DNI document front
        $imgDniFront = $request->file('dni_document_front');
        $dniFront = "img_".Str::uuid().".".$imgDniFront->guessExtension();
        $dniFrontPath = $imgDniFront->storeAs('uploads/images', $dniFront, 'public');

        // DNI document back
        $imgDniBack = $request->file('dni_document_back');
        $dniBack = "img_".Str::uuid().".".$imgDniBack->guessExtension();
        $dniBackPath = $imgDniBack->storeAs('uploads/images', $dniBack, 'public');

        // Driving license
        $imgDl = $request->file('driving_license');
        $dl = "img_".Str::uuid().".".$imgDl->guessExtension();
        $dlPath = $imgDl->storeAs('uploads/images', $dl, 'public');

        // Transit license
        $imgTl = $request->file('transit_license');
        $tl = "img_".Str::uuid().".".$imgTl->guessExtension();
        $tlPath = $imgTl->storeAs('uploads/images', $tl, 'public');

        // Mandatory insurance
        $imgMi = $request->file('mandatory_insurance');
        $mi = "img_".Str::uuid().".".$imgMi->guessExtension();
        $miPath = $imgMi->storeAs('uploads/images', $mi, 'public');

        // Profile photo
        $imgPp = $request->file('profile_photo');
        $pp = "img_".Str::uuid().".".$imgPp->guessExtension();
        $ppPath = $imgMi->storeAs('uploads/images', $pp, 'public');

        DeliveryModel::create([
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'vehicle_type' => $request->vehicle_type,

            'dni_document_front' => $dniFrontPath,
            'dni_document_back' => $dniBackPath,
            'driving_license' => $dlPath,
            'transit_license' => $tlPath,
            'mandatory_insurance' => $miPath,
            'profile_photo' => $ppPath,
            'user_id' => $user->id
        ]);
        
        $deliveryRole = RoleModel::where('name', 'delivery')->first();
        $user->roles()->attach($deliveryRole);

        return response('Domiciliario registrado correctamente');
    }
    
}
