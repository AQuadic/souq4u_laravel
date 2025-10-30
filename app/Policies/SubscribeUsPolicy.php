<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SubscribeUsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view any models.
     */
    public function viewAny(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return match ($admin->getMorphClass()) {
            'admin' => $admin->can('view_any_subscribe'),
            'super_admin' => true,
            default => false,
        };
    }

    /**
     * Determine whether the admin can view the model.
     */
    public function view(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return match ($admin->getMorphClass()) {
            'admin' => $admin->can('view_subscribe'),
            'super_admin' => true,
            default => false,
        };
    }

    /**
     * Determine whether the admin can create models.
     */
    public function create(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return match ($admin->getMorphClass()) {
            'admin' => $admin->can('create_subscribe'),
            'super_admin' => true,
            default => false,
        };
    }

    /**
     * Determine whether the admin can update the model.
     */
    public function update(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return match ($admin->getMorphClass()) {
            'admin' => $admin->can('update_subscribe'),
            'super_admin' => true,
            default => false,
        };
    }

    /**
     * Determine whether the admin can delete the model.
     */
    public function delete(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return match ($admin->getMorphClass()) {
            'admin' => $admin->can('delete_subscribe'),
            'super_admin' => true,
            default => false,
        };
    }

    /**
     * Determine whether the admin can bulk delete.
     */
    public function deleteAny(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('delete_any_subscribe');
    }

    /**
     * Determine whether the admin can permanently delete.
     */
    public function forceDelete(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('force_delete_subscribe');
    }

    /**
     * Determine whether the admin can permanently bulk delete.
     */
    public function forceDeleteAny(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('force_delete_any_subscribe');
    }

    /**
     * Determine whether the admin can restore.
     */
    public function restore(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('restore_testimonials');
    }

    /**
     * Determine whether the admin can bulk restore.
     */
    public function restoreAny(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('restore_any_testimonials');
    }

    /**
     * Determine whether the admin can replicate.
     */
    public function replicate(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('replicate_testimonials');
    }

    /**
     * Determine whether the admin can reorder.
     */
    public function reorder(Authenticatable|Model|SuperAdmin $admin): bool
    {
        return $admin->can('reorder_testimonials');
    }
}
