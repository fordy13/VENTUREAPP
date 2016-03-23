<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{

    protected $companies;

    public function __construct(CompanyRepository $companies)
    {
        $this->companies = $companies;
    }

    public function index(Request $request)
    {
        return view('companies.index', [
            'companies' => $this->companies->getCompanies(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->save();

        return redirect('/companies');
    }

    public function editView(Request $request, Company $company)
    {
        return view('companies.edit', [
            'company' => $company,
        ]);
    }

    public function edit(Request $request, Company $company)
    {
        $this->authorize('edit', $company);

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $company->name = $request->name;
        $company->save();

        return redirect('/companies');
    }

    protected function register(Request $request)
    {
        return view('auth.register', [
            'companies' => $this->companies->getCompanies(),
        ]);
    }
}
