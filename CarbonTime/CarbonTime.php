<?php
namespace App\Repositories;
use Carbon\carbon;

class CarbonTime
{

// USE CASE
// Pass it in your controller with a method injection
// For my use case, I used it to convert the time to BIGINT by just assigning a variable as below
/*
	public function store(CarbonTime $getTime)
	{
		$dt = $getTime->getCarbonTime();
		$saveTime = $dt->timestamp;
	}
	* 
	* SaveTime is stored as BIGINT value - 1565489214
* 
*  */


  public function getCarbonTime(){
    $dt = Carbon::now();
    return $dt;
  }


}

 ?>
