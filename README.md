
# Junior Software Engineer - Fullstack (Laravel/VueJS)
This project aims to create a product catalog with the ability to sort and filter by category or price. Each product has a name, description, price, image, and belongs to one or more categories. Categories have a name and can have a parent category. The system allows for product creation via web and command-line interfaces and ensures automated testing for product creation.

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Getting start](#getting-start)
- [Project Structure](#project-structure)
- [Author](#author) 

## Features
Create products via Laravel Artisan CLI. Filter by category and sort by price via view.

- Ability to create a product (from web and cli)
- A listing products with ability to sort by price, or/and filter by a category (from web)

## Requirements
- [Git](https://git-scm.com/) : Git is a free and open source distributed version control system.
- [Composer](https://getcomposer.org/) : is a tool for dependency management.
- [Node.js](https://nodejs.org/en/) :  is a cross-platform, open-source server environment.

> **Note**
> You can check requirements for laravel 10 and its versions using this [link](https://laravel.com/docs/10.x/upgrade#updating-dependencies).

## Installation
To install the project, first open to your work directory and use `git clone` clone it to your local machine. Then, use `composer install` to download the necessary PHP packages and `npm install` to download the required JavaScript packages. Once installed, run the `npm run build` command to bundle your application's assets, making them ready for production deployment.

## Getting Start
- [Quick Start](#quick-start)
- [Usage](#usage) 


## Quick Start
Next steps after installing the project, Start Laravel's local development server using the Laravel's Artisan CLI serve command `php artisan serve`, Once you have started the Artisan development server, your application will be accessible in your web browser at `http://127.0.0.1:8000`.

Ability to create a product using the laravel Artisan CLI:

```command
  php artisa product:create [arguments] [options]
```
```command
  php artisan product:create <name> <description> <price> <category_id>
```

> **Note**
> In the event that no argument is not included, you will be taken to a asking about it.

With the aim of disrupting `ask` option, You must using the next option:

```command
  php artisa product:create <name> <description> <price> <category_id> [-a|--ask=false]
```
 
In cases you want to interact with the Laravel Artisan CLI product create, use command:
```command
  php artisan product:create
```
#### Inputs:
| Ask | Input |
| :-------- | :------------------------- |
| product name | `string, min:3, max:55`| 
| product description | `required, string, min:10, max:5000`| 
| product price | `required, numeric, min:1`| 
| product category_id | `required, numeric, id is exists in categories table`|
 
## Project Structure

- [Interfaces](#interfaces) 
- [Abstracts](#abstracts)
- [Repositories](#repositories) 
- [Services](#services) 
- [Providers](#providers) 
- [Controllers](#controller) 

```Structure
app/
├── Abstracts/
│   ├── AbstractBaseResourceRepository.php
│   ├── AbstractBaseResourceService.php
│   └── AbstractMediaBaseResourceService.php
├── Console/
│   ├── Commands.php
│   │   └── Products
│   │       └──CreateProductCommand.php
├── Http/
│   ├── Controllers/
│   │   ├── ProductController.php
│   │   └── ...
│   ├── Requests/
│   │   ├── ProductRequest.php
│   │   └── ...
│   └── ...
├── Interfaces/
│   ├── RepositoryInterfaces/
│   │   ├── CategoryRepositoryInterface.php
│   │   └── ProductRepositoryInterface.php
│   ├── ServiceInterfaces/
│   │   ├── CategoryServiceInterface.php
│   │   └── ProductServiceInterface.php
│   ├── BaseResourceServiceInterface.php
│   └── BaseResourceRepositoryInterface.php
├── Models/
│   ├── Category.php
│   ├── Product.php
│   ├── SubCategory.php
│   └── ...
├── Providers/
│   ├── AppServiceProvider.php
│   ├── RepositoryServiceProvider.php
│   └── ...
├── Repositories/
│   ├── CategoryRepository.php
│   └── ProductRepository.php
├── Services/
│   ├── CategoryService.php
│   └── ProductService.php
├── Traits/
│   ├── CliValidator.php
│   └── ImageUploaderTrait.php
└── ...
```

#### Interfaces
- [RepositoryInterfaces](https://github.com/marouane-tabib/challenge_of_youcan/tree/main/app/Interfaces/RepositoryInterfaces) 
    - [RepositoryInterfaces/CategoryRepositoryInterface](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Interfaces/RepositoryInterfaces/CategoryRepositoryInterface.php) 
    - [RepositoryInterfaces/ProductRepositoryInterface](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Interfaces/RepositoryInterfaces/ProductRepositoryInterface.php) 
- [ServiceInterfaces](https://github.com/marouane-tabib/challenge_of_youcan/tree/main/app/Interfaces/ServiceInterfaces) 
    - [ServiceInterfaces/ProductServiceInterface](#interfaces) 
    - [ServiceInterfaces/CategoryServiceInterface](#interfaces) 
- [BaseResourceRepositoryInterface](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Interfaces/BaseResourceRepositoryInterface.php) 
- [BaseResourceServiceInterface](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Interfaces/BaseResourceServiceInterface.php) 

#### Abstracts
- [AbstractBaseResourceRepository](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Abstracts/AbstractBaseResourceRepository.php) 
- [AbstractBaseResourceService](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Abstracts/AbstractBaseResourceService.php) 
- [AbstractMediaBaseResourceService](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Abstracts/AbstractMediaBaseResourceService.php) 

#### Repositories
- [CategoryRepository](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Repositories/CategoryRepository.php) 
- [ProductRepository](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Repositories/ProductRepository.php)

#### Services
- [CategoryService](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Services/CategoryService.php) 
- [ProductService](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Services/ProductService.php)

#### Traits
- [CliValidator](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Traits/CliValidator.php) 
- [ImageUploaderTrait](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Traits/ImageUploaderTrait.php)

#### Providers
- [AppServiceProvider](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Providers/AppServiceProvider.php) 
- [RepositoryServiceProvider](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Providers/RepositoryServiceProvider.php)

#### Controllers
- [ProductController](https://github.com/marouane-tabib/challenge_of_youcan/blob/main/app/Http/Controllers/ProductController.php)

## Usage 
- [View](#view)
- [Artisan CLI](#artisan-cli) 
- [Testing](#testing)

#### View
Command to run Artisan development server:
```bash
  php artisan serve
```
Once you have started the Artisan development server, your application will be accessible in your web browser at `http://127.0.0.1:8000`.
After this you can interact with the application.


### Artisan CLI
Command to run Laravel Artisan CLI to create product with arguments:

```command
  php artisan product:create <name> <description> <price> <category_id>
```

##### EX:
```command
  php artisan product:create t-shirt "Bold, vibrant and comfortable - make a statement with our unique t-shirt designs" 200 3
```

Command to run Laravel Artisan CLI to create product with asking method:

```command
  php artisan product:create 
```

##### Ex:
```command
 Product Name?:
 > t-shirt
 Product Description?:
 > Bold, vibrant and comfortable - make a statement with our unique t-shirt designs
 Product Price?:
 > 200
 Show All Categories.
+----+--------------------------+
| id | name                     |
+----+--------------------------+
| 1  | Brielle Morissette       |
| 2  | Trey Nienow              |
| 3  | Prof. Clemens Raynor Jr. |
| 4  | Mr. Jordan Halvorson II  |
| 5  | Dewitt Shields           |
+----+--------------------------+
 Choise Product Category With Id?:
 > 3
```

##### Result:
```command
  Product Created Successfully.
```

##### Or Validation Error:
```command
   Exception 

  The price field must be a number.

  at app\Traits\CliValidator.php:23
     19▕             $attribute => $validation
     20▕         ]);
     21▕
  ➜  23▕             throw new Exception($validator->errors()->first($attribute));
     24▕         }
     25▕
     26▕         return $value;
     27▕     }
 // ...
```

## Author
- [@marouane-tabib](https://github.com/marouane-tabib)

