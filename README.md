# FindJobs - Job Listing Platform

FindJobs is a modern, full-featured job listing platform built with the Laravel framework. It allows users to post job listings, search for jobs, apply for positions, and manage their own postings and bookmarks.

## 🚀 Tech Stack

- **Backend:** PHP 8.2+, Laravel 11.31
- **Frontend:** Blade Templates, Tailwind CSS, Vite
- **Database:** SQLite (default)
- **Build Tool:** Vite

## ✨ Key Features

- **User Authentication:** Robust registration and login system with user avatars.
- **Job Management:** Complete CRUD (Create, Read, Update, Delete) functionality for job listings.
- **Search & Filtering:** Advanced search capabilities based on keywords and location.
- **Job Applications:** Logged-in users can apply for jobs by submitting contact details, a message, and a resume.
- **Bookmarking System:** Users can save job listings to their personal bookmarks for later viewing.
- **User Dashboard:** A centralized dashboard for users to manage their job listings and view applicants for their posted jobs.
- **Authorization:** Granular access control using Laravel Policies (e.g., only job owners can edit or delete their listings).
- **Email Notifications:** (Available) Integrated mail system for job application notifications.

## 🗄️ Database Schema

### `users`
- `id`, `name`, `email`, `password`, `avatar`, `email_verified_at`, `remember_token`, `timestamps`

### `job_listings` (Main Table)
- `id`, `user_id` (Foreign Key)
- `title`, `description`, `salary`, `tags`, `job_type` (Enum: Full-Time, Part-Time, etc.)
- `remote` (Boolean), `requirements`, `benefits`
- `address`, `city`, `state`, `zipcode`
- `contact_email`, `contact_phone`
- `company_name`, `company_description`, `company_logo`, `company_website`
- `timestamps`

### `applicants`
- `id`, `user_id` (FK), `job_id` (FK)
- `full_name`, `contact_phone`, `contact_email`, `message`, `location`, `resume_path`
- `timestamps`

### `job_user_bookmarks` (Pivot Table)
- `id`, `user_id` (FK), `job_id` (FK)
- `timestamps`

## 🏗️ Core Architecture

The project follows the standard Laravel MVC (Model-View-Controller) pattern:

- **Models:** `User`, `Job`, `Applicant` (located in `app/Models/`)
- **Controllers:** (located in `app/Http/Controllers/`)
    - `JobController`: Handles job listing CRUD and searching.
    - `HomeController`: Manages the landing page.
    - `DashboardController`: Handles the user dashboard.
    - `BookmarkController`: Manages saving and removing bookmarks.
    - `ApplicantController`: Handles the application submission process.
    - `LoginController`, `RegisterController`: Manage authentication.
- **Policies:** `JobPolicy` (located in `app/Policies/`) - Ensures secure access to job-related actions.
- **Mail:** `JobApplied` (located in `app/Mail/`) - Handles email notifications when a user applies for a job.

## 🛣️ Routing Overview

Routes are defined in `routes/web.php` and categorized as follows:

- **Public Routes:** `/`, `/jobs`, `/jobs/{id}`, `/jobs/search`.
- **Auth Routes (Guest):** `/login`, `/register`.
- **Protected Routes (Auth):**
    - `/jobs/create`, `/jobs/{id}/edit`
    - `/dashboard`
    - `/bookmarks`
    - `/jobs/{job}/apply`
    - `/profile` (Update)

## 📁 Directory Structure (Highlights)

- `app/`: Core application logic (Models, Controllers, Policies, Providers).
- `bootstrap/`: Framework bootstrapping and service configuration.
- `config/`: Application configuration files.
- `database/`: Migrations, factories, and seeders.
- `public/`: Entry point (`index.php`) and compiled assets.
- `resources/`: Original assets (Views, CSS, JS).
- `routes/`: Web and console route definitions.
- `storage/`: Logs, compiled templates, and user-uploaded files (like resumes and avatars).
- `tests/`: Feature and Unit tests.

## 🛠️ Getting Started

1. **Clone the repository.**
2. **Install dependencies:** `composer install` and `npm install`.
3. **Environment Setup:** Copy `.env.example` to `.env` and set up your database.
4. **Database Migration:** `php artisan migrate`.
5. **Start Development:** `npm run dev` and `php artisan serve`.
