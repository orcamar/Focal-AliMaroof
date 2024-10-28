I created a Laravel project using various tools such as Visual Studio Code, the XAMPP server, and some features and packages. I downloaded Laravel 10 along with packages like laravel/ui and Node.js. The laravel/ui package provides secure and bug-free ready-made interfaces for authentication and login.

I created a main Dashboard interface that allows the admin to add, edit, and display categories, where each operation has its own Blade interface located in the AdminCategory folder. Similarly, there’s an interface for adding products, which includes fields for the product name, price, description, and the category it belongs to. All related pages for editing, adding, and displaying products are accessible from the main Dashboard. 

There are two deletion options: one for permanent deletion using `forcedelete` and the other for temporary deletion using `softdelete`. This feature is provided only for products. When performing a soft delete, the product is moved to a sidebar page called "trashed." Next to each record in the table is a restore button to restore the deleted record.

Another interface in the Dashboard is the "view orders" page, which displays customers and the products they ordered. We can delete any order we want, and we can search for customers by a specific product using a selection tag; we just need to choose the product name to display a list of customers who made a particular order.

We created controllers for products and categories, with each containing several methods. For example, in the categories controller, the `index` method displays products in a list and create Blade where additions and views happen. The `create` method navigates us to the list and create Blade for adding categories, and added categories are stored in the `store` method.

The `edit` method takes us to the category editing interface, and the update operation takes place in the `update` method where new values are stored. Finally, the `destroy` method allows us to delete the desired category. Similar methods exist in the product controller: `index` displays products on the main Dashboard, `create` provides an interface for adding new products, `edit` allows modifying existing products, and `show` displays a specific product. Additionally, there are extra methods like `softdelete` for temporary deletion as previously mentioned.

All the controllers we discussed were for web routes, which deal with Blade pages. Now we move to the API routes that interact with endpoints, tested in the Insomnia program. All API routes are in `Route/api`. We have the `api/login` route for user login and the `api/logout` route for logging out, along with the `api/orders` route for requesting a specific product. This route leads to a method in `Api/orderController` named `store`, which stores the customer’s name, email, product number, and price.

As for the database tables, we have a `users` table where user details are stored, including an `isAdmin` column to check if the user is an admin who can access the Dashboard. The default value for this column is 0, meaning the user is not an admin; if it’s 1, they can access the Dashboard page. We added users, one being an admin and the other a regular user, which we placed in the seeder for testing.

We run the command `php artisan migrate` to migrate the tables to the database, followed by a command to populate the values from the seeder into the users table. To run the project, we use the command `php artisan serve`, which takes us to the login page. If the user is an admin, they can log in; if not, they cannot. This check is verified using a middleware called `CheckUser`, which is applied to all pages related to the Dashboard to prevent unauthorized modifications and deletions. Additionally, there’s another middleware called `auth` to ensure the user is registered.

I hope you have an enjoyable and straightforward experience testing my program. Thank you! 
















<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->
# Focal-AliMaroof
