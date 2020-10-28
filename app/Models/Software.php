<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    public function maker() {
        $user = User::find($this->maker);
        return $user;
    } 

    public function rating() {
        $rating = 0;
        $rater = 0;

        $software_buyers = SoftwareBuyer::where([
            ['software_id', $this->id],
            ['rating', '>', 0]
        ])->get();        

        foreach ($software_buyers as $sb) {
            $rater++;
            $rating += $sb->rating;
        }

        if($rater > 0) $rating = $rating/$rater;

        return [$rating, $rater];
    }

    public function software_buyers() {
        $software_buyers = SoftwareBuyer::where([
            ['software_id', $this->id],
            ['rating', '>', 0]
        ])->get();        

        return $software_buyers;
    }
}