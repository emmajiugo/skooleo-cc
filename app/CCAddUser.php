<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCAddUser extends Model
{
    public function role()
    {
        return $this->belongsTo('Spatie\Permission\Models\Role');
    }
}
