<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Link extends Model
{

  public const MIN_LENGTH = 5;
  public const MAX_LENGTH = 9;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'code', 'path', 'redirects'
  ];


  protected static function boot() {
    parent::boot();

    static::creating(function ($link) {

    	$chars = self::MIN_LENGTH;

    	while (true) {
    		$link->code = (string) Str::random($chars);
    		if(!Link::whereCode($link->code)->exists()){
    			break;
    		} else {
    			if ($chars < self::MAX_LENGTH) {
    				$chars++;
    			} else {
    				$chars = self::MIN_LENGTH;
    			}
    		}
    	}
    });
  }
}