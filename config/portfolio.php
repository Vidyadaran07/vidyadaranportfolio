<?php

/*
|--------------------------------------------------------------------------
| Portfolio profile
|--------------------------------------------------------------------------
|
| Personal details and page content used across the site. A value set to
| null is "not decided yet": the site shows a placeholder locally and
| hides it in production.
|
*/

return [

    'name' => 'Vidyadaran M',
    'first_name' => 'Vidyadaran',
    'title' => 'Software Developer',
    'tagline' => 'Building practical web applications, business management systems, and API integrations.',

    // `?:` so an empty line in .env (PORTFOLIO_EMAIL=) still falls back to the default.
    'email' => env('PORTFOLIO_EMAIL') ?: 'vidyadaran07@gmail.com',
    'github_url' => env('PORTFOLIO_GITHUB_URL') ?: 'https://github.com/VidyadaranM007',
    'linkedin_url' => env('PORTFOLIO_LINKEDIN_URL') ?: 'https://www.linkedin.com/in/vidyadaran-m-a70929375/',
    'resume_url' => env('PORTFOLIO_RESUME_URL'),

    // Photo shown in the hero, relative to public/. Initials are shown until the file exists.
    'photo' => 'images/me.jpg',
    'initials' => 'VM',
    'location' => 'India',

    // Status pill in the hero. Set to null to hide it.
    'availability' => 'Available for freelance work',

    /*
    | Hero (first screen of the home page).
    | The headline is split so the accent word can get its own style.
    */
    'hero' => [
        'greeting' => "Hi, I'm Vidyadaran",
        'role' => 'Software Developer · PHP & Laravel',
        'headline' => ['Building practical', 'software', 'for real businesses.'],
        'intro' => 'Software Developer with an MCA (2025), focused on backend development with PHP and Laravel, MySQL databases, and API integrations that connect applications and services.',
    ],

    /*
    | Big numbers under the hero.
    */
    'stats' => [
        ['value' => '1+', 'label' => 'Year of professional experience'],
        ['value' => '4', 'label' => 'Business applications developed'],
        ['value' => 'MCA', 'label' => 'Adhiyamaan College of Engineering, 2025'],
    ],

    'meta' => [
        'title' => 'Vidyadaran M | Software Developer, PHP & Laravel',
        'description' => 'Portfolio of Vidyadaran M, a Software Developer building web applications, business management systems and API integrations with PHP, Laravel and MySQL.',
    ],

    /*
    | About
    */
    'about' => [
        'paragraphs' => [
            'I build and improve web applications that help businesses run their daily operations, from customer and lead management to HR, payroll and bookings.',
            'My work covers PHP and Laravel development, MySQL databases, REST APIs and third-party integrations, plus the frontend that ties it together. I like understanding how a system works as a whole: database design, request handling, user interface and integrations.',
            'I enjoy solving technical problems and debugging existing systems, and I keep improving my skills. My goal is reliable, maintainable software that solves real problems, and one day, products of my own.',
        ],
    ],

    /*
    | Logos in the scrolling strip (name => devicon class).
    */
    'logos' => [
        'PHP' => 'devicon-php-plain',
        'Laravel' => 'devicon-laravel-original',
        'MySQL' => 'devicon-mysql-original',
        'JavaScript' => 'devicon-javascript-plain',
        'HTML' => 'devicon-html5-plain',
        'CSS' => 'devicon-css3-plain',
        'Git' => 'devicon-git-plain',
        'GitHub' => 'devicon-github-original',
    ],

    /*
    | Technical skills, grouped.
    */
    'skills' => [
        ['group' => 'Backend Development', 'icon' => 'bi-server', 'items' => ['PHP', 'Laravel', 'REST API handling', 'API integration', 'Server-side application development']],
        ['group' => 'Frontend Development', 'icon' => 'bi-window', 'items' => ['HTML', 'CSS', 'JavaScript']],
        ['group' => 'Database', 'icon' => 'bi-database', 'items' => ['MySQL', 'SQL queries and database operations']],
        ['group' => 'Development Tools', 'icon' => 'bi-git', 'items' => ['Git', 'GitHub']],
    ],

    // Shown as a full-width strip under the skill cards.
    'application_areas' => ['CRM', 'HRM', 'Payroll management', 'Seminar hall booking', 'Third-party API integrations', 'AI model development (in progress)'],

    /*
    | Projects: the business applications I developed, then the AI project
    | I am currently building.
    */
    'projects' => [
        'note' => 'I developed each of these applications, building their features, database operations and user interfaces.',

        'items' => [
            [
                'title' => 'Customer Relationship Management (CRM)',
                'category' => 'Business Management Software',
                'icon' => 'bi-people',
                'summary' => 'A CRM application supporting business workflows for customer and lead management.',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS', 'API integrations'],
                'areas' => [
                    'Customer and lead management workflows',
                    'User roles and permission-based functionality',
                    'Database operations and application maintenance',
                    'API integration and troubleshooting',
                ],
            ],
            [
                'title' => 'Human Resource Management (HRM)',
                'category' => 'Business Management Software',
                'icon' => 'bi-person-badge',
                'summary' => 'An HRM system supporting human resource and employee-related business processes.',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
                'areas' => [
                    'Employee information management',
                    'HR workflow management',
                    'Employee records and administrative operations',
                ],
            ],
            [
                'title' => 'Payroll Management System',
                'category' => 'Business Management Software',
                'icon' => 'bi-cash-stack',
                'summary' => 'A payroll management application supporting payroll-related operations.',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
                'areas' => [
                    'Employee payroll information',
                    'Payroll records and reporting',
                ],
            ],
            [
                'title' => 'Seminar Hall Booking System',
                'category' => 'Booking and Reservation Software',
                'icon' => 'bi-calendar-check',
                'summary' => 'An application supporting seminar hall booking and reservation workflows.',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
                'areas' => [
                    'Seminar hall information management',
                    'Booking requests and reservation workflows',
                    'Booking status and administrative management',
                ],
            ],
        ],

        // Shown as a full-width "currently building" banner under the cards.
        'current' => [
            'title' => 'AI Model Development',
            'status' => 'In progress',
            'summary' => 'I am working on AI model creation to explore how intelligent systems can be developed and incorporated into software applications.',
        ],
    ],

    /*
    | Professional experience.
    */
    'experience' => [
        [
            'role' => 'Software Developer',
            'company' => 'Turing Code Technologies',
            'duration' => 'About 1 year',
            'summary' => 'Developing, maintaining, and improving web applications using PHP and related web technologies.',
            'points' => [
                'Backend application development',
                'Database queries and application data management',
                'API integration and request handling',
                'Debugging and troubleshooting application issues',
                'Frontend and backend integration',
                'Working with business application workflows',
            ],
        ],
    ],

    /*
    | Education
    */
    'education' => [
        [
            'degree' => 'Master of Computer Applications (MCA)',
            'institution' => 'Adhiyamaan College of Engineering',
            'year' => '2025',
            'summary' => 'My postgraduate education provided the academic foundation for my continued development in software engineering and application development.',
        ],
    ],

    /*
    | Career objective (shown as Now / Next / Long term in the closing card).
    */
    'objective' => [
        'paragraphs' => [
            'My objective is to grow as a Software Developer by strengthening my backend development skills, improving my understanding of software architecture, and building reliable applications.',
            'I am interested in opportunities where I can contribute to real-world software projects, work with experienced developers, solve technical challenges, and continue learning modern development practices.',
            'In the long term, I aspire to build my own technology-driven products and business solutions.',
        ],
    ],

    'contact' => [
        'intro' => 'I am interested in connecting with developers, technology professionals, and people working on meaningful software projects.',
        'closing' => "Let's connect and build useful technology together.",
    ],

    /*
    | Home page sections shown in the navigation, in order (section id => label).
    */
    'nav' => [
        'home' => 'Home',
        'about' => 'About',
        'skills' => 'Skills',
        'projects' => 'Projects',
        'journey' => 'Journey',
        'contact' => 'Contact',
    ],

    /*
    | Sections linked from the footer.
    */
    'footer_nav' => ['about', 'skills', 'projects', 'journey', 'contact'],

];
