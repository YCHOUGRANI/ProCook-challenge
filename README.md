# ProCook Challenge

1. I used Laravel 7 for developing API Resource.

As infrastructure I used an official Docker Composer for Laravel 7  https://hub.docker.com/r/bitnami/laravel
Which contains two containers one for laravel 7 and one for mysql. I added an other container for phpmyadmin exposed via port 8081 (http://localhost:8081)
2.	Install Docker and Docker compose:
https://docs.docker.com/engine/install/
https://docs.docker.com/compose/install/
3.	Then clone the source code from git https://github.com/YCHOUGRANI/ProCook-challenge
4.	Run Docker-composer up -d
5.	docker-compose exec myapp php artisan migrate:refresh --seed
6.	Browse the link http://localhost:8000/

7. I scafold the controller, model, migration, factory and seeder for the both model Category and Product as following:
php artisan make:model Model/Category -a
php artisan make:model Model/Product -a

8. The entry point for the Api in "/routes/api.php" is to start with a list of cotegories, then for each 
   category we can fetch a list of product for that specific category.
   
Route::apiResource('/categories', 'CategoryController');
Route::group(
    ['prefix' => 'categories'],
    function () {
        Route::apiResource('/{category}/products', 'ProductController');
    }

);
   
   See the postman doc:  https://documenter.getpostman.com/view/15131373/TzCL7njW
   
   
    
   Get one specific product (by default in English lang) :
   Get http://localhost:8000/api/categories/1/products/4
   
   The name-via-local and name-via-query-string is just to demonstrate two way to trigger the translation: (See \App\Http\Resources\ProductResource.php)
         - One via the localisation  'name-via-locale' => app()->getLocale() == 'en' ? $this->product_name : $this->product_name_fr,
         - One via the query string  'name-via-query-string' => $request->has('lang') &&  $request->input('lang') == 'fr' ?  $this->product_name_fr : $this->product_name,
   Example in english:    
   Get http://localhost:8000/api/categories/1/products/4   
   {
  "data": {
    "id": 4,
    "name-via-locale": "sed",
    "name-via-query-string": "sed",
    "desc": "Aut nihil sunt eum ut. Ea similique dignissimos voluptatibus odit. Exercitationem ex consequuntur vel voluptatem inventore ipsam est. Pariatur vel beatae suscipit nihil.",
    "category": "Cookware",
    "price": 406.14,
    "href": {
      "link": "http://192.168.1.171:8000/api/categories/1/products/4"
    }
  },
}

Example in frensh:
Get http://localhost:8000/api/categories/1/products/4?lang=fr
{
  "data": {
    "id": 4,
    "name-via-locale": "sed",
    "name-via-query-string": "cuillère",
    "desc": "Aut nihil sunt eum ut. Ea similique dignissimos voluptatibus odit. Exercitationem ex consequuntur vel voluptatem inventore ipsam est. Pariatur vel beatae suscipit nihil.",
    "category": "Cookware",
    "price": 406.14,
    "href": {
      "link": "http://192.168.1.171:8000/api/categories/1/products/4"
    }
  },
  "version": "1.0.0",
  "author_url": "youcef"
}

   
   List of categories:
   GET http://localhost:8000/api/categories/
      
{
  "data": [
    {
      "name": "Cookware",
      "description": "Serve up a superior slice with pizza pans that distribute heat evenly and cook your pizza to perfection. Make mouth watering Mediterranean meals with our non-stick paella pans that help to retain moisture and flavo",
      "href": {
        "products": "http://192.168.1.171:8000/api/categories/1/products"
      }
    },
    {
      "name": "Steamers",
      "description": "Steaming is the healthiest way to prepare your meals. Instead of boiling your food, which can cause nutrients to seep into the water, try steaming it with one of our stunning ProCook steamer sets. Crafted from high grade materials, our steamers and poachers are dishwasher safe",
      "href": {
        "products": "http://192.168.1.171:8000/api/categories/2/products"
      }
    },
    {
      "name": "Baking",
      "description": "Buy bakeware sets from ProCook, the UK's leading specialist baking sets retailer with next day delivery and money back guarantee",
      "href": {
        "products": "http://192.168.1.171:8000/api/categories/3/products"
      }
    }
  ]
}
   
   List of products for category 1:
   Get http://localhost:8000/api/categories/1/products
   
   
{
  "data": [
    {
      "id": 4,
      "name-via-locale": "sed",
      "name-via-query-string": "sed",
      "desc": "Aut nihil sunt eum ut. Ea similique dignissimos voluptatibus odit. Exercitationem ex consequuntur vel voluptatem inventore ipsam est. Pariatur vel beatae suscipit nihil.",
      "category": "Cookware",
      "price": 406.14,
      "href": {
        "link": "http://192.168.1.171:8000/api/categories/1/products/4"
      }
    },
    {
      "id": 11,
      "name-via-locale": "ut",
      "name-via-query-string": "ut",
      "desc": "Ratione deserunt odio corporis quasi natus est explicabo. Magni iure quis beatae. Eos libero laudantium nobis voluptas aut.",
      "category": "Cookware",
      "price": 1394.55,
      "href": {
        "link": "http://192.168.1.171:8000/api/categories/1/products/11"
      }
    },
    {
      "id": 13,
      "name-via-locale": "qui",
      "name-via-query-string": "qui",
      "desc": "Harum perspiciatis ad enim et. Asperiores dolorum fuga ut ut dolores nihil. Iste unde ut vel corrupti quaerat.",
      "category": "Cookware",
      "price": 1907.27,
      "href": {
        "link": "http://192.168.1.171:8000/api/categories/1/products/13"
      }
    }
  ]
 }
   
   Create a new product:
   POST http://localhost:8000/api/categories/1/products/
   
   Update an existen product:
   PUT http://localhost:8000/api/categories/1/products/22
   
   Delete an existen product:
   PUT http://localhost:8000/api/categories/1/products/22
   
   
