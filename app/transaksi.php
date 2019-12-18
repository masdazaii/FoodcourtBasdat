<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
     /*
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'transaksi';


    /**
     * Table primary key to define table id
     *
     * @var string
     */
    protected $primaryKey = 'transaksi_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pelanggan_id',
        'menu_id',
        'jumlah',
        'total_harga',
        'created_at',
        'updated_at'
    ];

    public function menu()
    {
        return $this->hasOne('App\menu','menu_id','menu_id');
    }

    public function pelanggan()
    {
        return $this->hasOne('App\pelanggan','pelanggan_id','pelanggan_id');
    }
}
