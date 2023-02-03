<?php

namespace App\Policies;

use App\User;
use App\Story;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given user can delete the given story.
     *
     * @param  User  $user
     * @param  Story  $story
     * @return bool
     */
    public function destroy(User $user, Story $story)
    {
        return $user->id === $story->user_id;
    }

}
