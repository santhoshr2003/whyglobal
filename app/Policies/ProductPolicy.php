<?php
namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any products.
     */
    public function viewAny(User $user)
    {
        return $user->access_all_privileges == 1 || in_array($user->role_id, [1, 2, 3]);
    }

    /**
     * Determine whether the user can view the product.
     */
    public function view(User $user, Product $product)
    {
        return $user->access_all_privileges == 1 || in_array($user->role_id, [1, 2, 3]);
    }

    /**
     * Determine whether the user can create products.
     */
    public function create(User $user)
    {
        return $user->access_all_privileges == 1 || in_array($user->role_id, [1, 2]);
    }

    /**
     * Determine whether the user can update the product.
     */
    public function update(User $user, Product $product)
    {
        return $user->access_all_privileges == 1 || in_array($user->role_id, [1, 2]);
    }

    /**
     * Determine whether the user can delete the product.
     */
    public function delete(User $user, Product $product)
    {
        return $user->access_all_privileges == 1 || $user->role_id == 1;
    }
}
