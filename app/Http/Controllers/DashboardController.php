<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Domains\Employees\EmployeesService;

class DashboardController extends Controller
{
    protected EmployeesService $employeesService;
    public function __construct(EmployeesService $employeesService)
    {
        $this->employeesService = $employeesService;
    }

    public function index(): View
    {
        return view('sections.private.dashboard', [
            'user' => $this->employeesService->getById(Session::get('userId'))
        ]);
    }
}
