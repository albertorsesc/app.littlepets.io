<?php

namespace App\Policies\Blog\Articles;

use App\Models\User;
use App\Models\Blog\BlogCategory;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCategoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability) : ?bool
    {
        return $user->isEditor();
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     *
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User  $user
     * @param BlogCategory $blogCategory
     *
     * @return Response|bool
     */
    public function view(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param BlogCategory $blogCategory
     *
     * @return Response|bool
     */
    public function update(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param BlogCategory  $blogCategory
     *
     * @return Response|bool
     */
    public function delete(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User $user
     * @param BlogCategory  $blogCategory
     *
     * @return Response|bool
     */
    public function restore(User $user, BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User $user
     * @param  BlogCategory  $blogCategory
     *
     * @return Response|bool
     */
    public function forceDelete(User $user, BlogCategory $blogCategory)
    {
        //
    }
}
