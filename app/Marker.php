<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Marker extends Model
{
    protected $table = 'markers';
    protected $fillable = [
        'name','description','latitude','longitude'
    ];
    protected $hidden = ['id'];

    // private $name = null;
    // private $description = null;
    // private $latitude = null;
    // private $longitude = null;

    public static function checkMarkerHasID($id)
    {
        $marker = Marker::find($id);
        if($marker == null){
            return [
                'has'=>false
            ];
        }
        return [
            'has'=>true,
            'object'=>$marker
        ];
    }
}
