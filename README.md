API Built Alongside the Main Project

This API allows user registration, login, logout, and URL shortening using Laravel Sanctum for authentication. All responses are in JSON.

# How this works:

Authentication

1. Register
Endpoint: POST /register
Request Body:
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "secret123",
  "password_confirmation": "secret123"
}
Success Response:
{
  "message": "Registration complete!",
  "user": {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com"
  },
  "token": "SANCTUM_API_TOKEN"
}

2. Login
Endpoint: POST /login
Request Body:
{
  "email": "john@example.com",
  "password": "secret123"
}
Success Response:
{
  "message": "Login successful!",
  "user": { "id": 1, "name": "John Doe", "email": "john@example.com" },
  "token": "SANCTUM_API_TOKEN"
}

3. Logout
Endpoint: POST /logout
Headers: Authorization: Bearer SANCTUM_API_TOKEN
Success Response:
{
  "message": "Logged out successfully"
}

URL Shortener

1. Shorten URL
Endpoint: POST /shorten-url
Headers: Authorization: Bearer SANCTUM_API_TOKEN
Request Body:
{
  "original_url": "https://example.com"
}
Success Response:
{
  "message": "Successfully URL shortened!",
  "original_url": "https://example.com",
  "short_url":  "http://localhost:8000/api/redirect/abc123"
}

2. Redirect
Endpoint: GET /redirect/{shortCode}
Behavior: Redirects to the original URL
Error Response:
{
  "message": "Not found!"
}

Notes:
- Passwords are securely hashed.
- API token required for authenticated routes.
- Duplicate URLs are rejected.
- All errors return JSON with meaningful messages.
