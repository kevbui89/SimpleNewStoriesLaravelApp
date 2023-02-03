<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'stories';
    protected $fillable = ['title', 'post',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @param User $user
     * @return bool
     */
    public function userCanEdit(User $user)
    {
        return $user->id === $this->user_id;
    }



}
