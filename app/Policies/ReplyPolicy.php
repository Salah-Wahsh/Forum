<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;

class ReplyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user,  Reply $reply){
        return $reply->user_id==$user->id;
    }
}
