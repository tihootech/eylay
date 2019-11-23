<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public static function make($otype, $oid, $user)
    {
    	$like = new self;
		$like->owner_id = $oid;
		$like->owner_type = class_name($otype);
		$like->liker_id = $user->class_id();
		$like->liker_type = $user->class_type();
		$like->save();
		return $like;
    }
}
