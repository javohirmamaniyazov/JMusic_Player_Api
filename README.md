# Welcome to My Api
***Music_Player_Api***

This is an API for a music player built using the Laravel framework.

## Link 
http://javohiy9.beget.tech/api/musics


## Task 
  ### Resolve API Integration Issues
    - Unexpected error responses from the API endpoints.
    - Incorrect data retrieval from the API.
    - Authentication issues when accessing protected endpoints.
    - Inconsistent response formatting.
    - Difficulty in handling validation and error messages.

## Description
To overcome the API problems and bugs I encountered, 
I sought help from resources like Stack Overflow, Laravelcasts, Laravel documentation, 
and YouTube video tutorials. By leveraging these valuable sources of information and guidance, 
I successfully resolved the issues and achieved seamless integration of the API into my application.

## Installation
To install the project, follow these steps:
    1. Clone the repository: git clone [repository_url]
    2. Navigate to the project directory: cd music-player-api
    3. Install the dependencies: composer install
    4. Create a copy of the .env.example file and rename it to .env: cp .env.example .env
    5. Generate the application key: php artisan key:generate
    6. Run the database migrations: php artisan migrate

## Usage
To run the API server, use the following command: `php artisan serve`
You can use a tool like Postman to interact with the API endpoints. The base URL for the API is `http://localhost:8000/api`.

## Endpoints
    - GET /api/musics: Retrieve a list of all music tracks.
    - GET /api/musics/{id}: Retrieve a specific music track by its ID.
    - POST /api/musics: Create a new music track.
    - PUT /api/musics/{id}: Update an existing music track.
    - DELETE /api/musics/{id}: Delete a music track.
Make sure to replace `{id}` with the actual ID of the music track when using the respective endpoints.

```
./my_project argument1 argument2
```

### The Core Team
Mamaniyazov Javohir
    mamaniya_j


<span><i>Made at <a href='https://qwasar.io'>Qwasar SV -- Software Engineering School</a></i></span>
<span><img alt='Qwasar SV -- Software Engineering School's Logo' src='https://storage.googleapis.com/qwasar-public/qwasar-logo_50x50.png' width='20px'></span>
