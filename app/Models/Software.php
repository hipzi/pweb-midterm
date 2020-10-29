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

    public static function monthSalesRate($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count"))
            ->join('software_buyers', 'software_buyers.software_id', '=', 'software.id')
            ->whereYear('software_buyers.updated_at', date('Y'))
            ->where('software.maker', '=', $seller_id)
            ->groupBy(\DB::raw("Month(software_buyers.updated_at)"))
            ->pluck('count');
    }

    public static function monthSalesRateName($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count, Month(software_buyers.updated_at) as month"))
            ->join('software_buyers', 'software_buyers.software_id', '=', 'software.id')
            ->whereYear('software_buyers.updated_at', date('Y'))
            ->where('software.maker', '=', $seller_id)
            ->groupBy(\DB::raw("Month(software_buyers.updated_at)"))
            ->pluck('month');
    }

    public static function yearSalesRate($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count"))
            ->join('software_buyers', 'software_buyers.software_id', '=', 'software.id')
            ->where('software.maker', '=', $seller_id)
            ->groupBy(\DB::raw("Year(software_buyers.updated_at)"))
            ->pluck('count');
    }

    public static function yearSalesRateName($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count, Year(software_buyers.updated_at) as year"))
            ->join('software_buyers', 'software_buyers.software_id', '=', 'software.id')
            ->where('software.maker', '=', $seller_id)
            ->groupBy(\DB::raw("Year(software_buyers.updated_at)"))
            ->pluck('month');
    }

    public static function softwareTypeMobile($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count"))
            ->where('software.maker', '=', $seller_id)
            ->where('software.type_id', '=', 3)
            ->groupBy(\DB::raw("software.type_id"))
            ->pluck('count');
    }

    public static function softwareTypeWebsite($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count"))
            ->where('software.maker', '=', $seller_id)
            ->where('software.type_id', '=', 2)
            ->groupBy(\DB::raw("software.type_id"))
            ->pluck('count');
    }

    public static function softwareTypeDesktop($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count"))
            ->where('software.maker', '=', $seller_id)
            ->where('software.type_id', '=', 1)
            ->groupBy(\DB::raw("software.type_id"))
            ->pluck('count');
    }

    public static function chartSoftware($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count"))
            ->join('software_buyers', 'software_buyers.software_id', '=', 'software.id')
            ->where('software.maker', '=', $seller_id)
            ->groupBy(\DB::raw("software.name"))
            ->pluck('count');
    }

    public static function chartSoftwareName($seller_id){
        return Software::select(\DB::raw("COUNT(*) as count, software.name as name"))
            ->join('software_buyers', 'software_buyers.software_id', '=', 'software.id')
            ->where('software.maker', '=', $seller_id)
            ->groupBy(\DB::raw("software.name"))
            ->pluck('name');
    }
}