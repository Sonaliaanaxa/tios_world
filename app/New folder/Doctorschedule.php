<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctorschedule extends Model
{
   
      public function attributes(){
        return $this->hasmany('App\ScheduleAttribute','scheduleId');
        
        
    }
}
