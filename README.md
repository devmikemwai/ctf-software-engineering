# LAMP Judging System

A lightweight, PHP-based judging and scoreboard system built with the LAMP stack (Linux, Apache, MySQL, PHP). Judges can assign scores to participants, and the public scoreboard updates automatically to reflect rankings.

---

## Features

- Add judges via admin panel
- Judges can assign scores to users
- Public scoreboard auto-updates every 10 seconds
- Scores are ranked in real-time based on totals
- Responsive design (mobile/tablet friendly)

---

## Setup Instructions

1. **Database Setup**
   - Import the SQL dump file:  
     ```bash
     mysql -u your_username -p your_database < sql/schema.sql
     ```

2. **Deploy Code**
   - Place the project folder into your web root (`htdocs` for XAMPP or `/var/www/html` for Apache).

3. **Database Connection**
   - Edit `includes/db.php`:
     ```php
     $conn = new mysqli('localhost', 'your_user', 'your_password', 'your_database');
     ```

4. **Access Interfaces**
   - Admin Panel: `http://localhost/your-path/admin/add_judge.php`
   - Judge Scoring: `http://localhost/your-path/judge/score_user.php`
   - Public Scoreboard: `http://localhost/your-path/public/scoreboard.php`

---

## Design Choices

### Database Structure
- **users**: Stores participant information.
- **judges**: Stores judge profiles.
- **scores**: Links users and judges with points given.

**Why this structure?**
- Supports many-to-many relationships (a judge can score many users, and users can be scored by many judges).
- Allows aggregation and sorting with `GROUP BY` and `SUM()`.
- Can be extended easily (e.g., add timestamp, category, etc.).

### PHP Implementation
- Used **prepared statements** to prevent SQL injection.
- Utilized `htmlspecialchars()` to prevent XSS in output.
- Clean separation of concerns: DB logic in PHP, display in HTML.
- Auto-refresh on scoreboard using `<meta http-equiv="refresh">`.

### Frontend
- Pure CSS for styling to keep the system lightweight.
- Responsive table layout for mobile viewing using media queries.

---

## Assumptions

- All participants (users) are pre-registered in the database.
- No login system implemented yet — assume trust in usage.
- Judges and participants are manually added for now.

---

## Future Improvements

- Add authentication and role-based access (admin/judge)
- Live updates with AJAX or WebSockets
- Prevent duplicate scoring by the same judge for the same user
- Improve responsive design for tablets and smaller phones
- Export scoreboard to CSV or PDF

---

## Author

**Michael Gichimu Mwai**  
Username: `mgichimu8`  
Email: mgichimu8@gmail.com  
GitHub: [DevMikeMwai](https://github.com/DevMikeMwai)
website: [Portfolio](https://devmikemwai-oklf.vercel.app/) 
