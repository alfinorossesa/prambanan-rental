<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRequest;
use App\Models\User;
use App\Services\Customer\UserService;

class AdminController extends Controller
{
    protected $userServcie;
    public function __construct(UserService $userServcie)
    {
        $this->userServcie = $userServcie;
    }

    public function profile()
    {   
        return view('admin.admin-profile.profile');
    }

    public function update(AdminRequest $request, User $admin)
    {
        $this->userServcie->updateUser($request, $admin);
        
        return redirect()->route('admin.profile', auth()->user()->id)->with('success', 'Profile berhasil di update!');
    }
}
