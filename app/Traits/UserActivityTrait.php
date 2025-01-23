<?php


namespace App\Traits;

use Carbon\Carbon;

trait UserActivityTrait 
{
    public function isOnline()
    {
        return $this->last_activity && 
               Carbon::parse($this->last_activity)->diffInMinutes() < 5; // Было меньше 5, поменял на 1 Carbon::parse($this->last_activity)->diffInMinutes() < 5
    }

    public function lastSeenFormatted()
    {
        if (!$this->last_activity) return 'Давно';
        
        $diff = Carbon::parse($this->last_activity)->diffInMinutes();
        
        if ($diff < 1) return 'Только что';
        if ($diff < 5) return 'Несколько минут назад';
        if ($diff < 60) return $diff . ' минут назад';
        if ($diff < 1440) return floor($diff / 60) . ' часов назад';
        
        return Carbon::parse($this->last_activity)->diffForHumans();
    }
}
