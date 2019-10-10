<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinions extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'opinions';
    protected $fillable = [
        'id_apps', 'training','sentiment','content','preprocess', 'id_object', 'arr_word', 'arr_counted', 'arr_group', 'role_group','create_at'
    ];

    public static function getFromSentiment($sentiment){
    	return Opinions::select('*')->where('sentiment',$sentiment)->get();
    }
    public static function getFromObjek($objek){
        return Opinions::select('*')->where('id_object',$objek)->get();
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
