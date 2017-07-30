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
}
