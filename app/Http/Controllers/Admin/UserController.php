<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserService $service)
    {
        //
    }

    public function index(Request $request)
    {
        $users = $this->service->getUsers($request->search,$request->role);
        return view('admin.users.index',compact('users'));
    }

    public function toggleStatus(User $user)
    {
        $this->service->toggleStatus($user);
        return back()->with('success','User status updated.');
    }

    public function destroy(User $user)
    {
        $this->service->delete($user);
        return back()->with('success','User deleted.');
    }
}
