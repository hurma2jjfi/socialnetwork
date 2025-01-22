<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Channel;

class ChannelPolicy
{
    public function update(User $user, Channel $channel)
    {
        return $user->id === $channel->owner_id;
    }

    public function delete(User $user, Channel $channel)
    {
        return $user->id === $channel->owner_id;
    }
}
