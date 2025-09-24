<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     */
    public function home()
    {
        // This method simply returns the 'home' view.
        return view('home');
    }

    /**
     * Display the users page and pass user data to it.
     */
    public function users()
    {
        // We define the user data here, inside the controller method.
        $users = [
            ['id' => 1, 'name' => 'Alice Johnson', 'email' => 'alice@example.com', 'role' => 'Admin', 'status' => 'Active'],
            ['id' => 2, 'name' => 'Bob Williams', 'email' => 'bob@example.com', 'role' => 'User', 'status' => 'Active'],
            ['id' => 3, 'name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'role' => 'Editor', 'status' => 'Inactive'],
            ['id' => 4, 'name' => 'Diana Prince', 'email' => 'diana@example.com', 'role' => 'User', 'status' => 'Active'],
            ['id' => 5, 'name' => 'Eve Adams', 'email' => 'eve@example.com', 'role' => 'User', 'status' => 'Suspended'],
        ];

        // We return the 'users' view and pass the $users array to it.
        return view('users', compact('users'));
    }
}
