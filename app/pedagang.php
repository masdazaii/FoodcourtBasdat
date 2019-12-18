<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pedagang extends Model
{
    /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'pedagang';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'pedagang_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_pedagang',
        'outlet',
        'no_telp',
        'created_at',
        'updated_at'
    ];
}
