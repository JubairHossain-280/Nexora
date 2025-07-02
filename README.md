# Nexora - Social Media Web App

Nexora is a lightweight social media web application that emulates core features of platforms like Facebook. Built with a focus on simplicity, responsiveness, and real-time interactivity, Nexora enables users to connect, share stories, and engage with posts seamlessly.

![Logo](assets/img/brand.png)

## 🔧 Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP (Raw PHP, no framework)
- **Database**: MySQL
- **Server**: Apache (XAMPP Localhost)

## ✨ Features

### 🧾 User Authentication
- Secure signup and login system
- Session-based user management

### 📝 Posts
- Create, display, and interact with posts
- "See more" feature for long content
- Modal-based post preview on click (without page reload)

### 💬 Comments
- Real-time comment submission using AJAX
- Nested inside post modals
- Stored efficiently in a relational MySQL schema

### 📸 Stories (Like Facebook/Instagram)
- Users can share video stories
- Horizontal story slider with navigation buttons
- Story preview functionality with auto-play video
- Stories expire after 24 hours (handled in backend logic)

### 🧠 AJAX-Driven Interactions
- No page reload for actions like submitting comments or opening modals
- Smoother and more dynamic user experience

## 📁 Project Structure
/Nexora
│
├── api/ # PHP API endpoints for dynamic frontend requests
├── assets/ # Static files (images, icons, etc.)
├── css/ # Stylesheets
├── js/ # Frontend scripts (story slider, post preview, etc.)
├── php/ # Backend logic (database functions, session checks)
├── stories/ # Uploaded story videos
├── uploads/ # Uploaded post media
│
├── index.php # Homepage/feed
├── login.php # Login page
├── signup.php # Signup page
├── story.php # Story preview logic
├── post_modal.php # Post modal logic
├── connection.php # Database configuration
└── README.md # Project overview and instructions


## ⚙️ How to Run Locally

1. **Clone this repository**
   ```bash
   git clone https://github.com/JubairHossain-280/Nexora.git
2. Start XAMPP
- Start Apache and MySQL modules
- Import the provided .sql file 
3. Place project folder inside
C:\xampp\htdocs\
4. Visit in browser
http://localhost/Nexora/

Developed with passion by Jubair Hossain 💻

[![Portfolio](https://img.shields.io/badge/portfolio-seagreen?style=for-the-badge&logo=portfolio&logoColor=white)](https://jubair-app.vercel.app/)
[![GitHub](https://img.shields.io/badge/github-000?style=for-the-badge&logo=github&logoColor=white)](https://github.com/JubairHossain-280/)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/jubair-hossain-805550341/)




