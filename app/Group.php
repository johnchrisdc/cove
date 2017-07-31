<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Group extends Model
{
    public function getLeader() {
        $user = User::where('id', $this->leader_id)->first();
        $this->attributes['leader'] = $user;
    }

    public function getGroupMembersCount() {
        $count = User::where('group_id', $this->id)->count();
        $this->attributes['members_count'] = $count;
    }
}
