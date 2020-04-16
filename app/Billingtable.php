<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billingtable extends Model
{
     protected $fillable = [
    	'username',
    	'mobile_number',
    	'amount_to_bill',
    ];
}
