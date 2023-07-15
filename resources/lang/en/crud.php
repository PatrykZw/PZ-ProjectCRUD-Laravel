<?php

/*
Translation of product-related elements
*/

return [
    'logreg' => [
        'register' => 'Register',
        'registered' => 'Registered',
        'name' => 'Username',
        'email' => 'Email address',
        'password' => 'Password',
        'confirm' => 'Confirm password',
        'login' => 'Login',
        'logged' => 'Logged in',
        'remember' => 'Remember me',
        'forgot' => 'Forgot password',
        'reset' => 'Reset password',
        'send' => 'Send password reset link',
    ],
    'message' => [
        'confirm' => [
            'users' => 'Are you sure you want to permanently delete the selected user?',
            'cars' => 'Are you sure you want to permanently delete the selected car?',
        ],
        'users' => [
            'success_user_add' => 'User added successfully',
            'success_user_updated' => 'User updated successfully',
            'success_user_deleted' => 'User deleted successfully!',
        ],
        'cars' => [
            'success_car_stored' => 'Car added!',
            'success_car_updated' => 'Car updated!',
            'success_car_borrowed' => 'Car borrowed',
            'success_car_deleted' => 'Car deleted!',
        ],
    ],
    'enums' => [
        'fuel' => [
            'Electric' => 'Electric',
            'Hybrid' => 'Hybrid',
            'Petrol' => 'Petrol',
            'Oil' => 'Diesel',
        ],
        'transmission' => [
            'Automatic' => 'Automatic',
            'Manual' => 'Manual',
        ],
        'status' => [
            'Fabric' => 'Factory',
            'Modified' => 'Modified',
        ],
        'role' => [
            'admin' => 'administrator',
            'user' => 'user',
        ],
    ],
    'button' => [
        'save' => 'Save',
        'add' => 'Add',
        'display' => 'Display',
        'edit' => 'Edit',
        'modify' => 'Modify',
        'borrowed' => 'Borrow',
        'remove' => 'Remove',
    ],
    'layout' => [
        'name' => 'ProjectCRUD',
        'users' => 'Users',
        'cars' => 'Cars',
        'logout' => 'Logout',
        'login' => 'Login',
        'register' => 'Register',
    ],
    'welcome' => [
        'sortbyprice' => 'Sort by price',
        'ascending' => 'Ascending',
        'descending' => 'Descending',
        'perday' => 'per day',
        'accessible' => 'Available',
        'unaccessible' => 'Unavailable',
        'borrow' => 'Borrow',
        'backtotop' => 'Back to top',
        'accessiblecarsnumber' => 'Number of accessible cars',
        'price' => 'Price',
        'search' => 'Search',
        'borrowed' => 'Borrowed car: :make :model',
    ],
    'users' => [
        'main' => [
            'userslist' => 'Users List',
            'id' => 'ID',
            'email' => 'Email',
            'name' => 'Username',
            'role' => 'Role',
            'action' => 'Actions',
        ],
        'create' => [
            'usercreate' => 'Create User',
            'usercreated' => 'Create User',
        ],
        'edit' => [
            'useredit' => 'Edit User: :name',
        ],
    ],
    'cars' => [
        'main' => [
            'carslist' => 'Cars List',
            'id' => 'ID',
            'make' => 'Make',
            'model' => 'Model',
            'bodyshape' => 'Body Shape',
            'fuel' => 'Fuel Type',
            'transmission' => 'Transmission',
            'engine' => 'Engine',
            'enginecapacity' => 'Engine Capacity',
            'carstatus' => 'Status',
            'dayrepayment' => 'Daily Cost',
            'allcost' => 'Total Cost',
            'rentaldate' => 'Rental Date',
            'returndate' => 'Return Date',
            'image' => 'Image',
            'action' => 'Actions',
        ],
        'create' => [
            'addcar' => 'Add Car',
        ],
        'show' => [
            'viewcar' => 'View Car: :make :model',
        ],
        'edit' => [
            'editcar' => 'Edit Car: :make :model',
        ],
        'modify' => [
            'modifycar' => 'Modify Car: :make :model',
        ],
    ],
];