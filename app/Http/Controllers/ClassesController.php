<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Domains\Classes\ClassesService;
use App\Domains\Employees\EmployeesService;

class ClassesController extends Controller
{
    protected ClassesService $classesService;
    protected EmployeesService $employeesService;

    public function __construct(ClassesService $classesService, EmployeesService $employeesService)
    {
        $this->classesService = $classesService;
        $this->employeesService = $employeesService;
    }

    public function index(): View
    {
        $classes = $this->classesService->get();

        return view('sections.private.classes.index', [
            'user' => $this->employeesService->getById(Session::get('userId')),
            'classes' => $classes
        ]);

    }
}
