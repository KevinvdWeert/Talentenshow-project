# Talentenshow Project

A web application for managing a talent show event, including participant registration, ticket booking, and an admin dashboard for user management.

## Project Structure

```
project-root/
│
├── dashboard/
│   └── index.php           # Admin dashboard (user management, IP display, countdown, pagination, activation)
│
├── assets/
│   ├── css/
│   │   └── style.css       # Main CSS file
│   ├── js/
│   │   └── main.js         # Main JavaScript file
│   ├── images/             # (Image assets)
│   └── fonts/              # (Font assets)
│
├── database/
│   ├── scripts/
│   │   └── init.sql        # Database initialization script
│   ├── backups/            # (Database backups)
│   └── connection.php      # Database connection (PDO)
│
├── includes/
│   ├── header.php          # Standard header (navigation, branding)
│   ├── footer.php          # Standard footer (copyright)
│   ├── functions.php       # Common reusable PHP functions
│   └── db_connect.php      # Database connection logic
│
├── pages/
│   ├── home.php            # Homepage content
│   ├── registration.php    # Participant registration page
│   ├── booking.php         # Ticket booking page
│   ├── visitors.php        # Visitors overview page (Admin)
│
├── lineup.php              # Festival line-up page (public)
├── docs/                   # Project documentation and notes
│
└── index.php               # Homepage (entry point)
```

## Features

- **Public Pages:** Homepage, registration, booking, festival line-up.
- **Admin Dashboard:** User management, IP address display, event countdown by country, paginated user list, account activation/deactivation.
- **Reusable Includes:** Shared header, footer, and functions.
- **Database:** PDO connection, initialization scripts, and backups.
- **Assets:** Centralized CSS, JS, images, and fonts.

## Getting Started

1. Clone the repository or copy the project files.
2. Set up your web server (e.g., XAMPP) and place the project in the web root.
3. Import the database using `database/scripts/init.sql`.
4. Configure database credentials in `database/connection.php` and/or `includes/db_connect.php`.
5. Access the site via `https://duurzaamheid.info/index.php` for public pages or `https://duurzaamheid.info/dashboard/index.php` for admin.

## Documentation

See `docs/project structure.txt` for detailed structure and explanations.

## License

[Specify your license here]
