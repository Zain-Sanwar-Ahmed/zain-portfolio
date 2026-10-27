
<?php

use Illuminate\Support\Facades\Route;

Route::get('/portfolio', function () {
    return response()->json([
        'name' => 'Zain Sanwar Ahmed',
        'title' => 'Aspiring Full-Stack Developer',
        'location' => 'Dhaka, Bangladesh',
        'skills' => [
            'HTML & CSS',
            'JavaScript',
            'Vue.js',
            'PHP',
            'Laravel',
            'MySQL',
            'Git & GitHub',
            'REST APIs',
        ],
        'message' => 'Welcome to my portfolio!',
    ]);
});
