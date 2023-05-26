<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\MailHelper\notificationHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('company.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $request->validated();

        DB::beginTransaction();
        try {
            $image = $request->file('logo_asset');
            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('', $filename, 'public');

            Company::create(array_merge($request->only(['name', 'email', 'website']), ['logo_asset' => $path]));
            DB::commit();

            $notificationHelper = new notificationHelper();
            $notificationHelper->sendNotification($request->email, [
                'title' => 'Mail from danielsalipot.rakso.exam',
                'body' => 'Your company ' . $request->name . ' has been added in our database'
            ]);

            return redirect('/company')->with('success', 'success in creating new company');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'error in creating new company');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('Company.show', ['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('Company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $request->validated();
        DB::beginTransaction();
        try {
            if (isset($request->logo_asset)) {
                $image = $request->file('logo_asset');
                $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('', $filename, 'public');

                if ($company->logo_asset != 'logo1.png' && $company->logo_asset != 'logo2.png' && $company->logo_asset != 'logo3.png') {
                    Storage::disk('public')->delete($company->logo_asset);
                }

                $company->update(['logo_asset' => $path]);
            }

            $company->update($request->only(['name', 'email', 'website']));
            DB::commit();

            return redirect('/company')->with('success', 'success in updating new company');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'error in updating new company');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        DB::beginTransaction();
        try {
            $company->delete();
            DB::commit();
            return redirect('/company')->with('delete', 'successfully deleted');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('error', 'error in deleting');
        }
    }
}
