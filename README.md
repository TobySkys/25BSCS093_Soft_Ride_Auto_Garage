# Auto Garage System

## Student Information
- Student Name:BAMWESIGYE TOLBERT R.
- Registration Number:25BSCS093

---

## Brief Description
This is an auto garage website that handles booking services for customers, purchase items for their vehicle needs and contact the garage for inquiry. 


---

## Technologies Used
- PHP — Server-side scripting and backend logic
- MySQL — Database management and storage
- HTML — Structure and layout of web pages
- CSS — Styling and responsive design
- JavaScript — Client-side interactivity

---

## Steps to Run the Project

1. Clone the repository
   ```bash
   git clone https://github.com/yourusername/your-repo-name.git
   ```

2. Move the project to your server directory
   - For XAMPP: Copy the folder to `C:/xampp/htdocs/`

3. Start your local server
   - Open XAMPP/WAMP and start Apache and MySQL

4. Import the database(see Database Import Instructions below)

5. Open the project in your browser
   ```
   http://localhost/your-repo-name/
   ```

---

## Database Import Instructions

1. Open your browser and go to:
   ```
   http://localhost/phpmyadmin
   ```

2. Click "New" to create a new database and name it (e.g., `db_name`)

3. Select the new database, then click the "Import" tab

4. Click "Choose File" and select the `.sql` file from the project folder (e.g., `database/db_name.sql`)

5. Click "Go" to import the database

6. Open `config/connect.php` and update the credentials:
   ```php
   $host = "localhost";
   $user = "root";
   $password = "";
   $database = "your_db_name";
   ```

---

## Login Credentials (for testing)
| Username | Password |
|----------|----------|
|    admin | admin123 |
