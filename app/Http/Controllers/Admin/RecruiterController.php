<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RecruiterRequest;
use App\Models\User;
use App\Services\Admin\RecruiterService;
use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    public function __construct(private RecruiterService $service){}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recruiters = $this->service->index($request->search);
        $statistics = $this->service->statistics();
        return view('admin.recruiters.index',compact('recruiters','statistics'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.recruiters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecruiterRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.recruiters.index')->with('success','Recruiter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $recruiter)
    {
         $recruiter = $this->service->show($recruiter);
        return view('admin.recruiters.show',compact('recruiter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $recruiter)
    {
        return view('admin.recruiters.edit',compact('recruiter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecruiterRequest $request, User $recruiter)
    {
        $this->service->update($recruiter,$request->validated());
        return redirect()->route('admin.recruiters.index')->with('success','Recruiter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $recruiter)
    {
        $this->service->delete($recruiter);
        return redirect()->route('admin.recruiters.index')->with('success','Recruiter deleted successfully');
    }
}
