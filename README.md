<p align="center">
<img src="https://i.ibb.co/CPY6X6p/logo.png" alt="">
</p>

<h1 align="center">Best choice for gourmets</h1>

## Gourmania is an open source project that lets you create, browse and store recipes.

>This project is under active development
> 
>  - implementing automates tests with [Pest](https://pestphp.com/)
>  - core features are working
>  - updates and improvements are ongoing
>  - expect changes in future releases

## Table of contents

- [Introduction](#introduction)
- [Features](#features)
     - [User Features](#user-features)
     - [Recipe Features](#recipe-features)
     - [Admin Features](#admin-features)
     - [Info & Legal Pages](#info--legal-pages)
     - [Extra Features](#extra-features)
- [Installation](#installation)
- [Team](#team)

## Introduction

Gourmania is an open source project that enables you to create, search and save recipes you like. It provides intuitive interface and a lot of valuable information for every gourmet.

## Features
### User Features
- Profile customization: name, photo, bio ... (with ability to update them)
- Account credentials: email, password (with ability to update them)
- Registration + Email Verification
- Password reset
- Display created, liked, saved recipes

### Recipe Features
- Step-by-step wizard form for creating / editing recipes
- Individual recipe page with ingredients and guide
- Recipe library with pagination
- Likes / Dislikes for recipes 
- Save recipes to personal cookbook
- Global search for recipes by name
- Advanced recipe filtering with dependent dropdowns
- Quick filters by popularity, relevance, and time (week, month, year)

### Admin Features
- User roles (user, admin) with permissions
- Admin panel with user, recipe, ingredient management and more
- Admin recipe wizard form via Filament
- Dashboard analytics with charts for users, recipes and cuisines analytics

### Info & Legal Pages
- Informative pages: FAQ, Basics (cooking tools), Techniques (cooking methods)
- Legal pages: Privacy Policy, Terms Of Use

### Extra Features
- Dynamic homepage (manage and create sections: latest recipes, category recipes, “Authors of the Week”)
- Newsletter subscription via email (footer)


### Installation

- Clone the repository

```
https://github.com/Dmytro-Shved/Gourmania.git
```

- Copy `.env.example` file to `.env` and edit database credentials there

```
copy .env.example .env
```

- Install dependencies

```
composer install
npm install
```

- Generate key

```
php artisan key:generate
```

- Run migrations

```
php artisan migrate
```

- Seed the database with test data

```
php artisan db:seed
```

- Create a link

```
php artisan storage:link 
``` 

- Run the application

```
php artisan serve 
npm run dev
```
- Launch the main URL and login with default credentials `admin@admin.com` | `1234567890`

### Team

At the moment the team consists of one person:
- [Dmytro Shved](https://github.com/Dmytro-Shved)

## License

Copyright © 2025 Gourmania

Licensed under [the MIT License](/LICENSE.md).
