<?php


namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Teams
 * @package App\Http\Models
 */
class Teams extends Model
{
    /**
     * @var string
     */
    protected $table = 'teams';
    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationNameK1()
    {
        return $this->belongsTo('App\Http\Models\Games', 'k1', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationNameK2()
    {
        return $this->belongsTo('App\Http\Models\Games', 'k2', 'id');
    }
}