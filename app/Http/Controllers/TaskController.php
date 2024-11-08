<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyUserPosition;
use App\Models\Task;
use App\Models\TaskAssignment;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $company = Company::where('owner_id', auth()->user()->id)->first();
        } else {
            $company = CompanyUserPosition::where('user_id', auth()->user()->id)->first()->company;
        }

        // dd($company);
        $tasks = Task::where('company_id', $company->id)->get();
        // $taskAssignments = TaskAssignment::where('company_id', $company->id)->get();
        $user = auth()->user();
        // dd($taskAssignments);
        // dd($user);
        return view('pages.tasks.index', compact('tasks', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = Company::where('owner_id', auth()->user()->id)->first();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'company_id' => $company->id,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $users = User::where('role_id', '!=', 1)->get();
        $getAssignmentUser = TaskAssignment::where('task_id', $task->id)->first();
        // dd($getAssignmentUser);

        return view('pages.tasks.show', compact('task', 'users', 'getAssignmentUser'));
    }

    public function assignTask(Request $request, Task $task)
    {
        $request->validate([
            'user' => 'required|exists:users,id',
        ]);
        TaskAssignment::create([
            'task_id' => $task->id,
            'user_id' => $request->user,
            'company_id' => $task->company_id,
            'status' => 'assigned',
            'assigned_at' => now(),
        ]);
        return redirect()->route('tasks.index')->with('success', 'Task assigned successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        TaskAssignment::where('task_id', $task->id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
