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
}
