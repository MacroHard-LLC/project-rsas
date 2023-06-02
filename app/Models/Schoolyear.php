<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    use HasFactory;

    protected $table = 'schoolyear';
    public $timestamps = FALSE;

    
    public function subject(){
        return $this->hasMany(Subject_table::class);
    }

    public function getSchoolDays(){
        
        $mondays = [];
        $tuesdays = [];
        $wednesdays = [];
        $thursdays = [];
        $fridays = [];

        $schoolDays = [$mondays, $tuesdays, $wednesdays, $thursdays, $fridays];
        
        $start_timestamp = strtotime($this->start_date);
        $end_timestamp = strtotime($this->end_date);

        while ($start_timestamp <= $end_timestamp){
            $day_of_week = date('N', $start_timestamp);

            if ($day_of_week == 1) {
                $mondays[] = date('l Y-m-d', $start_timestamp);
            } else if ($day_of_week == 2) {
                $tuesdays[] = date('l Y-m-d', $start_timestamp);
            } else if ($day_of_week == 3) {
                $wednesdays[] = date('l Y-m-d', $start_timestamp);
            } else if ($day_of_week == 4) {
                $thursdays[] = date('l Y-m-d', $start_timestamp);
            } else if ($day_of_week == 5) {
                $fridays[] = date('l Y-m-d', $start_timestamp);
            }

            $start_timestamp = strtotime('+1 week', $start_timestamp);
        }

        return $schoolDays;
    }
}
