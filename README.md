<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Building this project locally

Following the quick start guide, I took a few shorcuts to provide developers with a fast an easy experience locally.

1. Clone the project anywhere on your local machine.
2. Make sure docker desktop and deamon are installed and avaliable. Make sure to `cd LaravelGithubAPI` everthing else is run from whithin that directory.
3. Then create a .env file at the root of the folder and add the enviroment variables (super important or it might not work). Most variables are what you get from the quickstarted execpt for one GITHUB_TOKEN. That either you used someone token or create your own. Without the authetication will fail.
4. Run the folowing command `curl -s "https://gist.githubusercontent.com/bmartinez287/61e647924bfd89739407f151bf5cff58/raw/02be39ff2c1de9870d2d6cf50eb40cc8cc02f5ec/laravel.build" | bash`
This command was inspired by laravel's own https://laravel.build/example-app
5. Now its time to run `./vendor/bin/sail up`
6. As noted that command can be alias so its easier to run.
7. If everything is running we can hit localhost and see the stantard laravel welcome screen.
8. Then we must run `./vendor/bin/sail artisan migrate:refresh --seed` this command will preload the database with the search api query from github.
9. Then we can go to localhost/vanderbilt and see our website in action.
10. To see more details about each item click on the title.
11. To load a fresh set of data click on the reload button.

## Common error
If you did a `./vendor/bin/sail up` before adding the `.env` file you likely break the connection to the database. To restore it delete the mysql volume inside of docker desktop add the  `.env` file with the variables and `./vendor/bin/sail up`.

## License

The pet project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
