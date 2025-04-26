# Laravel-Role-Chat-App

A feature-rich chat application built with Laravel, enabling users to communicate securely with role-based permissions and authentication.

## Features

- **User Authentication**: Secure login and registration system
- **Role-Based Access Control**: Using Spatie Laravel-Permission package
- **Chat Between Users**: Private conversations between users
- **Permission System**: Granular control over chat access and functionality
- **Admin Dashboard**: For managing users, roles, and permissions

## Tech Stack

- **Backend**: Laravel PHP Framework
- **Database**: MySQL/
- **Authentication**: Laravel's built-in authentication
- **Authorization**: Spatie Laravel-Permission
- **Frontend**: Blade templates with optional JavaScript framework

## Installation

1. Clone the repository
```bash
cd role-chat-project
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Set up database in `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=root
DB_PASSWORD=password
```

5. Run migrations and seeders
```bash
php artisan migrate
php artisan db:seed
```

6. Compile assets
```bash
npm run dev
```

7. Start the server
```bash
php artisan serve
```

## Project Structure

- **Controllers**: 
  - `ChatController` - Handles chat functionality with authorization
- **Models**:
  - `User` - Extended with roles and permissions
  - `Chat` - Represents chat messages between users
- **Middleware**:
  - Authentication and authorization middleware
- **Views**:
  - Chat interfaces and message rendering

## Usage

### Basic Chat Flow

1. Users log in with their credentials
2. View available users
3. Select a user to start a conversation
4. Messages are displayed in chronological order
5. Admin users have access to all conversations

### Role-Based Permissions

- Regular users can only view their own messages
- Users with `chat_read_all` permission or `admin` role can view all messages
- Custom permissions can be added through the permission system.
- `admin` role can manage roles, permissions and users.

## Security

- All routes are protected with authentication middleware
- Resource authorization using Laravel's Policy system
- Role-based access control for sensitive operations

## License

This project is licensed under the MIT License - see the LICENSE file for details