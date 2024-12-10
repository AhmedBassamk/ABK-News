<?php

namespace App\Http\Controllers;

use App\Providers\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chatAdminController extends Controller
{
    function index(AdminService $adminService)
    {
        $admins = $adminService->get_admins();
        //    dd($admins);
        return view('dashboard.chat.index', compact('admins'));
    }
    function chat($admin_id, AdminService $adminService)
    {
        $receiver = $adminService->get_admin($admin_id);
        $userId = Auth::user()->id;

        $chatMessages = $adminService->getChatMessages($admin_id, $userId);

        return view('dashboard.chat.chat', compact('receiver', 'chatMessages', 'userId'));
    }
    function sendMessage($admin_id, AdminService $adminService, Request $request)
    {
        $adminService->sendMessages($admin_id, $request->message, Auth::user()->id);
        return response()->json('success');
    }

}
