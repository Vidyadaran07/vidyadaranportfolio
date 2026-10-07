<?php

/*
|--------------------------------------------------------------------------
| Portfolio profile
|--------------------------------------------------------------------------
|
| Personal details used across the site. Values that are private or not
| decided yet come from .env. When a value is missing, the site shows a
| placeholder locally and hides the link in production.
|
*/

return [

    'name' => 'Vidyadaran M',
    'first_name' => 'Vidyadaran',
    'title' => 'Software Developer',
    'tagline' => 'Building practical software, learning continuously, and working toward bigger things.',

    'email' => env('PORTFOLIO_EMAIL'),
    'github_url' => env('PORTFOLIO_GITHUB_URL', 'https://github.com/Vidyadaran07'),
    'linkedin_url' => env('PORTFOLIO_LINKEDIN_URL'),
    'resume_url' => env('PORTFOLIO_RESUME_URL'),

    /*
    | Hero (first screen of the home page).
    */
    'hero' => [
        'heading' => "Hi, I'm Vidyadaran.",
        'lead' => 'I build practical web applications and backend systems.',
        'intro' => 'Software Developer working with PHP and Laravel on CRM platforms, APIs, database-driven systems and third-party integrations.',
    ],

    'meta' => [
        'title' => 'Vidyadaran M | Software Developer',
        'description' => 'Portfolio of Vidyadaran M, a Software Developer specializing in PHP, Laravel, CRM systems, APIs, databases and web application development.',
    ],

    /*
    | Home page sections shown in the navigation, in order (section id => label).
    */
    'nav' => [
        'home' => 'Home',
        'about' => 'About',
        'experience' => 'Experience',
        'skills' => 'Skills',
        'projects' => 'Projects',
        'learning' => 'Learning',
        'contact' => 'Contact',
    ],

    /*
    | Sections linked from the footer.
    */
    'footer_nav' => ['home', 'about', 'experience', 'skills', 'projects', 'contact'],

];
