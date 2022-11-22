<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use Core\Service\StudentService;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    protected StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {
        $keywords = $request->search;
        $students = $this->studentService->getAll($keywords);
        return view('student.index', compact("students"));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(StudentStoreRequest $request)
    {
        $data = $request->all();
        $student = $this->studentService->store($data);
        return redirect()->route('student.index', compact('student'))
            ->with('store', 'success');
    }

    public function show($id)
    {
        $student = $this->studentService->find($id);
        return view('student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = $this->studentService->find($id);
        return view('student.edit', compact('student'));
    }

    public function update(StudentUpdateRequest $request, $id)
    {
        $this->studentService->update($request->all(), $id);
        return redirect()->route('student.index')
            ->with('update', 'success');
    }

    public function destroy($id)
    {
        $this->studentService->destroy($id);
        return redirect()->route('student.index')
            ->with('success', 'User has been deleted successfully');
    }
}

