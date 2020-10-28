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

    public function listSoftware($user_id){
        return SoftwareBuyer::join('software', 'software.id', '=', 'software_buyers.software_id')
        ->join('software_types', 'software_types.id', '=', 'software.type_id')
        ->join('statuses', 'statuses.id', '=', 'software_buyers.status_id')
        ->join('users', 'users.id', '=', 'software_buyers.user_id')
        ->select([
            'software_buyers.id',
            'software.name as software_name',
            'software.description as software_description',
            'software.price as software_price',
            'software_types.type as software_type',
            'statuses.status as software_status',
            'software.id as software_id',
        ])
        ->where('software_buyers.user_id', '=', $user_id)
        ->where('users.role', '=', 2);
    }

    public static function historySoftware(){
        return SoftwareBuyer::join('software', 'software.id', '=', 'software_buyers.software_id')
        ->join('software_types', 'software_types.id', '=', 'software.type_id')
        ->join('users', 'users.id', '=', 'software_buyers.user_id')
        ->select([
            'software_buyers.id',
            'software_buyers.updated_at as date',
            'software.name as software_name',
            'software.description as software_description',
            'software.price as software_price',
            'software_types.type as software_type',
            'software_buyers.rating as software_rating',
            'software_buyers.review as software_review',
        ])
        ->where('software_buyers.status_id', '=', 2);
    }
}
