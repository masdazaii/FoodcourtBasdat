<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'menu';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'menu_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pedagang_id',
        'nama_menu',
        'harga',
        'created_at',
        'updated_at'
    ];

    public function pedagang()
    {
        return $this->hasOne('App\pedagang','pedagang_id','pedagang_id');
    }
}
