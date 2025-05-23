# LAMP Judging System

## Features

- Add judges from admin panel
- Judges can assign points to users
- Public scoreboard auto-updates and ranks users by points

## Setup Instructions

1. Import the `sql/schema.sql` into your MySQL server.
2. Place the project folder into your XAMPP `htdocs` or appropriate web directory.
3. Edit `includes/db.php` with your DB credentials.
4. Access:
   - Admin Panel: `/admin/add_judge.php`
   - Judge Scoring: `/judge/score_user.php`
   - Scoreboard: `/public/scoreboard.php`

## Assumptions

- Users are pre-registered in the DB.
- No authentication for now; would use sessions + hashed passwords in production.

## Future Improvements

- Add login/auth system
- AJAX-based live scoreboard
- Prevent duplicate scoring by the same judge for the same user
- Responsive design

## Author

Michael Gichimu Mwai (Dev Mike Mwai)  
Username: `mgichimu`
