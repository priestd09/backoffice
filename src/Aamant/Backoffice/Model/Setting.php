<?php namespace Aamant\Backoffice\Model;

use Eloquent;

class Setting extends Eloquent {

	protected $guarded = array();

	public function scopeKey($query, $key)
	{
		return $query->where('key', $key)->first();
	}

	public function scopeGroup($query, $group)
	{
		return $query->where('group', $group);
	}
}
