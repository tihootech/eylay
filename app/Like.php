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
		$like->liker_id = $user->id;
		$like->save();
		return $like;
    }
}
