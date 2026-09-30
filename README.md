# TODO App - Task Management Website

TODO App is a modern, fully responsive task management web application built to help users organize their daily tasks, notes, and schedules efficiently.

## Features

- **Task Management**: Easily create, edit, complete, and delete tasks.
- **Custom Delete Confirmation**: Interactive HTML5 modal dialog to confirm task deletion safely.
- **Chronological Task Sorting**: Displays tasks in order, adding new entries naturally to the bottom of the list.
- **Rich Text Notes**: Integrated CKEditor for detailed and formatted task descriptions.
- **Fully Responsive Layout**: Built with Bootstrap 5 to ensure a clean UI across desktop, tablet, and mobile devices.

## Technologies Used

- **Laravel 11**: PHP framework handling backend routing, controllers, and database operations.
- **Blade Templating**: Dynamic rendering of application views.
- **Bootstrap 5 & FontAwesome**: Modern styling, layout design, and iconography.
- **JavaScript & HTML5 Dialog**: Clean client-side interaction for modal confirmations.
- **MySQL**: Relational database for storing tasks and user data.

## Project Structure

TODO-APP/
│
├── app/
│   └── Http/
│       └── Controllers/
│           └── TaskController.php
│
├── database/
│   └── migrations/
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── tasks/
│           ├── create.blade.php
│           ├── edit.blade.php
│           └── index.blade.php
│
├── routes/
│   └── web.php
│
└── .env.example
