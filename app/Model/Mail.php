<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
	public $from;
    public $to;
    public $content;
    public $subject;

}
