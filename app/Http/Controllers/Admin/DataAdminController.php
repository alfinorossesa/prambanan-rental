<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DataAdminRequest;
use App\Models\User;
use App\Services\Admin\DataAdminService;

class DataAdminController extends Controller
{

    protected $dataAdmin;
    public function __construct(DataAdminService $dataAdmin)
    {
        $this->dataAdmin = $dataAdmin;
    }

    public function index()
    {
        $admin = $this->dataAdmin->getAdmin();

        return view('admin.data-admin.index', compact('admin'));
    }

    public function create()
    {
        return view('admin.data-admin.create');
    }

    public function store(DataAdminRequest $request)
    {
        $this->dataAdmin->createAdmin($request);

        return redirect()->route('data-admin.index')->with('add', 'Admin berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        return view('admin.data-admin.show', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('data-admin.index')->with('destroy', 'Admin berhasil dihapus!');
    }
}
