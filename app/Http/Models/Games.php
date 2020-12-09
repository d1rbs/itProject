<?php


namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Games
 * @package App\Http\Models
 */
class Games extends Model
{
    /**
     * @var string
     */
    protected $table = 'games';

    /**
     * @var array
     */
    protected $fillable = [
        'done', 'k1', 'k2', 'g1', 'g2',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function relationK1()
    {
        return $this->hasOne('App\Http\Models\Teams', 'id', 'k1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function relationK2()
    {
        return $this->hasOne('App\Http\Models\Teams', 'id', 'k2');
    }
}