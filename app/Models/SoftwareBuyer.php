<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftwareBuyer extends Model
{
    use HasFactory;

    public function status() {
        $status = Status::find($this->status_id);
        return $status;
    }

    public function software() {
        $software = Software::find($this->software_id);
        return $software;
    }

    public function user() {
        $user = User::firstWhere('id', $this->user_id);
        return $user;
    }
}
