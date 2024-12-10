<?php

namespace App\Providers;

use App\Events\MessageSend;
use App\Models\chatAdmins;
use App\Models\User;

class AdminService
{
    public function get_admin($admin_id)
    {
        return User::where('id', $admin_id)->first();
    }
    public function getUnreadMessageCount($adminId, $userId)
    {
        return chatAdmins::where('receiver', $adminId)
            ->where('sender', $userId)
            ->where('is_read', false)
            ->count();
    }
    public function get_admins()
    {
        $userId = auth()->user()->id;

        $admins = User::where('id', '!=', $userId)->get();

        foreach ($admins as $admin) {
            $admin->unreadMessageCount = $this->getUnreadMessageCount($admin->id, $userId);
        }

        return $admins;
    }
    public function sendMessages($admin_id, $message, $sender_id)
    {
        chatAdmins::create([
            'sender' => $sender_id,
            'receiver' => $admin_id,
            'message' => $message,
        ]);
        $receiver = $this->get_admin($admin_id);
        broadcast(new MessageSend($message, $receiver));
    }

    public function getChatMessages($adminId, $userId)
    {
        $messages = chatAdmins::where(function ($query) use ($adminId, $userId) {
            $query->where('sender', $userId)
                ->where('receiver', $adminId);
        })
            ->orWhere(function ($query) use ($adminId, $userId) {
                $query->where('sender', $adminId)
                    ->where('receiver', $userId);
            })
            ->orderBy('created_at', 'asc')
            ->get();

        return $messages;
    }
}
