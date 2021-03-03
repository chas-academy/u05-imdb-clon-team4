<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Models used in the User, Role and Permission CRUDs.
    |
     */

    'models' => [
        'user' => App\Models\User::class,
        'permission' => Backpack\PermissionManager\app\Models\Permission::class,
        'role' => Backpack\PermissionManager\app\Models\Role::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Disallow the user interface for creating/updating permissions or roles.
    |--------------------------------------------------------------------------
    | Roles and permissions are used in code by their name
    | - ex: $user->hasPermissionTo('edit articles');
    |
    | So after the developer has entered all permissions and roles, the administrator should either:
    | - not have access to the panels
    | or
    | - creating and updating should be disabled
     */

    'allow_permission_create' => env('PERMISSION_CREATE', true),
    'allow_permission_update' => env('PERMISSION_UPDATE', true),
    'allow_permission_delete' => env('PERMISSION_DELETE', true),
    'allow_role_create' => env('ROLE_CREATE', true),
    'allow_role_update' => env('ROLE_UPDATE', true),
    'allow_role_delete' => env('ROLE_DELETE', true),

    /*
    |--------------------------------------------------------------------------
    | Multiple-guards functionality
    |--------------------------------------------------------------------------
    |
     */
    'multiple_guards' => false,

];
