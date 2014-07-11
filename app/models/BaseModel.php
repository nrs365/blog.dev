<?php

use Carbon\Carbon;

class BaseModel extends Eloquent {

   public function getCreatedAtAttribute($value)
    {
        // $utc = Carbon::CreateFormFormat($this->getDateFormat(), $value);
        // return $utc->setTimezone('America/Chicago');
        return $this->convertToLocalTimezone($value);
    }

    public function getUpdatedAttribute($value) 
    {
        // $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
        // return $utc->setTimezone('America/Chicago');
        return $this->convertToLocalTimezone($value);
    }

    private function convertToLocalTimezone($value)
    {
        $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
        return $utc->setTimezone('America/Chicago');
    }

}