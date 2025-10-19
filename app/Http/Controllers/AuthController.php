<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Domains\Employees\EmployeesService;

class AuthController extends Controller
{
    protected EmployeesService $employeesService;

    public function __construct(EmployeesService $employeesService)
    {
        $this->employeesService = $employeesService;
    }

    public function index(): View
    {
        return view('sections.public.login', [
            'users' => $this->employeesService->get()
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'user_id' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        Session::put('userId', $request->user_id);
        return redirect()->route('dashboard');
    }

    public function logout(): RedirectResponse
    {
        Session::forget('userId');
        return redirect()->route('auth.index');
    }
}
