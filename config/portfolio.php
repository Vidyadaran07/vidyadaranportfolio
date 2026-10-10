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


    // Photos, relative to public/: a square one for the round hero frame, a 4:5 one for the About card.
    // The About card falls back to the hero photo, and both show initials until a file exists.
    'photo' => 'images/profile-hero.webp',
    'about_photo' => 'images/profile-about.webp',
    'initials' => 'VM',
    'location' => 'India',
    'availability' => 'Available for new projects',
    'total_experience' => '2 years',

    /*
    | Hero (first screen of the home page).
    */
    'hero' => [
        'greeting' => "Hello, I'm",
        'highlights' => ['Laravel', 'PHP', 'REST APIs', 'CRM Systems'],
        'intro' => 'I build practical web applications, business management systems and API integrations with Laravel, PHP and MySQL.',
    ],

    'meta' => [
        'title' => 'Vidyadaran M | Laravel Developer for Business Software',
        'description' => 'Vidyadaran M builds custom CRM, HRM, payroll and booking systems, web applications and API integrations for businesses, with PHP, Laravel and MySQL.',
    ],

    /*
    | About
    */
    'about' => [
        'paragraphs' => [
            'I am a Software Developer who builds web applications that help businesses run their daily operations, from customer and lead management to HR, payroll and bookings.',
            'I handle the whole system for you: PHP and Laravel development, MySQL databases, REST APIs, third-party integrations and the frontend your team uses. I can also take over an existing system to fix bugs and add new features.',
        ],
    ],

    /*
    | Technical skills: six tiles.
    */
    'skills' => [
        ['group' => 'Backend', 'icon' => 'bi-server', 'items' => ['PHP', 'Laravel', 'REST API handling', 'Server-side development']],
        ['group' => 'Frontend', 'icon' => 'bi-code-slash', 'items' => ['HTML', 'CSS', 'JavaScript']],
        ['group' => 'Database', 'icon' => 'bi-database', 'items' => ['MySQL', 'SQL queries', 'Database operations']],
        ['group' => 'Tools', 'icon' => 'bi-git', 'items' => ['Git', 'GitHub']],
        ['group' => 'CRM & Business Apps', 'icon' => 'bi-diagram-3', 'items' => ['CRM', 'HRM', 'Payroll', 'Seminar hall booking']],
        ['group' => 'Integrations & More', 'icon' => 'bi-plug', 'items' => ['Third-party API integration', 'Payment & SMS gateways', 'Debugging & troubleshooting']],
    ],

    /*
    | Solutions I can build: sample concepts of business systems, offered to clients.
    | They are concepts, not delivered client projects, and the site labels them that way.
    | `slug` names an optional screenshot at public/images/projects/{slug}.png;
    | until it exists, the card shows the illustrated preview ({slug}-preview.webp).
    | Timelines are typical estimates for a first version; adjust them to what you can deliver.
    */
    'projects' => [
        'title' => 'Solutions I Can Build For You',
        'note' => 'Ready-to-customise business systems, based on the kind of applications I work on as a developer. Pick one and I will build it for your business.',
        'badge' => 'Sample concept',

        'items' => [
            [
                'slug' => 'crm',
                'title' => 'Customer Relationship Management (CRM)',
                'short_title' => 'CRM System',
                'category' => 'Sales & Customers',
                'icon' => 'bi-people',
                'summary' => 'Track every lead from first enquiry to closed deal, so your team never misses a follow-up.',
                'ideal_for' => 'Sales teams, real-estate agencies and service businesses',
                'timeline' => '4–6 weeks',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS', 'API integrations'],
                'features' => [
                    'Lead capture and tracking through every sales stage',
                    'Follow-up reminders and activity history',
                    'User roles and permissions for your team',
                    'Reports on leads, conversions and team performance',
                    'Connects to your website forms and other tools via API',
                ],
            ],
            [
                'slug' => 'hrm',
                'title' => 'Human Resource Management (HRM)',
                'short_title' => 'HRM System',
                'category' => 'People & HR',
                'icon' => 'bi-person-badge',
                'summary' => 'Keep employee records, attendance and leave in one place instead of spreadsheets.',
                'ideal_for' => 'Growing companies with 10 to 500 employees',
                'timeline' => '4–6 weeks',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
                'features' => [
                    'Employee records and documents in one place',
                    'Departments, designations and reporting structure',
                    'Attendance and leave requests with approvals',
                    'Role-based access for HR, managers and employees',
                ],
            ],
            [
                'slug' => 'payroll',
                'title' => 'Payroll Management System',
                'short_title' => 'Payroll System',
                'category' => 'Finance & Payroll',
                'icon' => 'bi-cash-stack',
                'summary' => 'Run monthly payroll and generate payslips in a few clicks, with clear records.',
                'ideal_for' => 'Businesses that run monthly payroll in-house',
                'timeline' => '3–5 weeks',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
                'features' => [
                    'Salary structures with earnings and deductions',
                    'Monthly payroll runs and payslip generation',
                    'Payroll records and reports',
                    'Works together with HRM employee data',
                ],
            ],
            [
                'slug' => 'seminar-hall',
                'title' => 'Seminar Hall Booking System',
                'short_title' => 'Seminar Hall Booking',
                'category' => 'Bookings & Reservations',
                'icon' => 'bi-calendar-check',
                'summary' => 'Let people book halls online and stop double bookings, with approvals built in.',
                'ideal_for' => 'Colleges, training institutes and offices with shared halls',
                'timeline' => '2–4 weeks',
                'stack' => ['PHP', 'Laravel', 'MySQL', 'JavaScript', 'HTML', 'CSS'],
                'features' => [
                    'Hall details, capacity and facilities',
                    'Online booking requests with date and time slots',
                    'Approval workflow and booking status',
                    'Booking history and availability overview',
                ],
            ],
            [
                // Upcoming: no features yet, so the card shows "Coming soon" and an "Ask about this" button.
                'slug' => 'ai-model',
                'title' => 'AI Model Service',
                'short_title' => 'AI Model Service',
                'category' => 'Upcoming Project',
                'icon' => 'bi-stars',
                'status' => 'Coming soon',
                'summary' => 'An AI assistant trained on your own business data, answering questions, predicting which leads will convert and drafting follow-ups for your team.',
                'ideal_for' => null,
                'timeline' => null,
                'stack' => ['Laravel', 'Python', 'AI APIs'],
                'features' => [],
            ],
        ],
    ],

    /*
    | How a project works, shown under the services.
    */
    'process' => [
        ['title' => 'Discuss', 'icon' => 'bi-chat-dots', 'text' => 'A free call to understand your business and what the system needs to do.'],
        ['title' => 'Plan', 'icon' => 'bi-clipboard-check', 'text' => 'A clear list of features, timeline and cost before any work starts.'],
        ['title' => 'Build', 'icon' => 'bi-code-slash', 'text' => 'Regular updates and demos so you see progress every week.'],
        ['title' => 'Deliver & Support', 'icon' => 'bi-rocket-takeoff', 'text' => 'Launch, training for your team, and help after delivery.'],
    ],

    /*
    | Services I offer.
    */
    'services' => [
        ['title' => 'Laravel Web Applications', 'icon' => 'bi-code-square', 'text' => 'Custom web applications built with PHP and Laravel, from database design to a clean, responsive interface.'],
        ['title' => 'CRM / HRM / Payroll Systems', 'icon' => 'bi-diagram-3', 'text' => 'Business management software for customers, leads, employees, payroll and bookings.'],
        ['title' => 'API Integration', 'icon' => 'bi-plug', 'text' => 'Connecting your application with REST APIs and third-party services, and fixing integrations that break.'],
        ['title' => 'Bug Fixing & Maintenance', 'icon' => 'bi-bug', 'text' => 'Debugging, troubleshooting and improving existing PHP and Laravel systems.'],
    ],

    /*
    | Professional experience.
    */
    'experience' => [
        [
            'role' => 'Software Developer',
            'company' => 'Turing Code Technologies',
            'duration' => '2025 · Present',
            'summary' => 'Building and maintaining a large property-management and real-estate CRM platform on Laravel and MySQL, used by admins, owners, tenants and vendors.',
            'points' => [
                'AI calling module: owner-lead pooling, lead assignment, campaigns and call recordings',
                'Attendance module: dashboard filters, late-arrival and leave reports, working-hours tracking',
                'WhatsApp and SMS gateway integration, including message templates and lead handling rules',
                'Tenant settlement, e-sign, inspection and admin approval workflows',
                'Property search by category, advanced search and user filters',
                'REST APIs with Passport and Sanctum, role-based access with Spatie Permission',
                'Third-party integrations: Google APIs, payment gateway and cloud file storage',
                'Debugging and fixing production issues through Git pull requests',
            ],
        ],
        [
            'role' => 'Software Developer',
            'company' => 'WMP Create Agency',
            'duration' => '2024 · 2025 (1 year)',
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
    | Real projects from my jobs, shown after the experience timeline.
    | Client and product names are left out on purpose.
    */
    'work' => [
        'title' => "Projects I've Worked On",
        'note' => 'Real systems I have built and maintain, running in production for businesses today.',

        'items' => [
            [
                'title' => 'Property Management & Real-Estate CRM',
                'icon' => 'bi-buildings',
                'text' => 'A large platform used by admins, property owners, tenants and vendors to manage leads, properties, tenancies and payments.',
                'stack' => ['Laravel', 'MySQL', 'REST APIs', 'Role-based access'],
            ],
            [
                'title' => 'AI Calling & Lead Automation',
                'icon' => 'bi-telephone-outbound',
                'text' => 'Automated calling to property owners, with source-based lead pooling, lead assignment, calling campaigns and call recordings.',
                'stack' => ['Laravel', 'Voice AI API', 'Queues'],
            ],
            [
                'title' => 'Attendance & HR Reports',
                'icon' => 'bi-calendar2-week',
                'text' => 'Attendance dashboard with filters, late-arrival and leave reports, department search and working-hours tracking.',
                'stack' => ['Laravel', 'MySQL', 'JavaScript'],
            ],
            [
                'title' => 'Tenant Settlement & E-Sign',
                'icon' => 'bi-file-earmark-check',
                'text' => 'Move-out settlement, property inspection, digital agreement signing and admin approval workflows.',
                'stack' => ['Laravel', 'PDF generation', 'Workflows'],
            ],
        ],
    ],

    /*
    | "Why work with me" card next to the contact form.
    */
    'why' => [
        'title' => 'Why Work With Me',
        'points' => [
            '2 years building business software used in production every day',
            'You talk directly to the developer, with no middlemen',
            'Clean Laravel code that you fully own',
            'Support and fixes after your system goes live',
        ],
    ],

    'contact' => [
        'intro' => 'Have a project in mind or want to work together? Send me a message and I will get back to you.',
    ],

    /*
    | Home page sections shown in the navigation, in order (section id => label).
    */
    'nav' => [
        'home' => 'Home',
        'about' => 'About',
        'skills' => 'Skills',
        'experience' => 'Experience',
        'projects' => 'Solutions',
        'services' => 'Services',
        'contact' => 'Contact',
    ],

    /*
    | Sections linked from the footer.
    */
    'footer_nav' => ['home', 'about', 'projects', 'services', 'contact'],

];
