# The News 🗞️

## Requirements 🚀
1. Install [Node 19](https://nodejs.org/en/)
2. Install [Composer](https://getcomposer.org/download/)
3. Install [Postman](https://www.postman.com/downloads/)

### macOS
1. Install PHP
   ``` brew install php ```
2. Make sure the ~/.composer/vendor/bin directory is in your system's "PATH".
3. Install Laravel Valet as a global Composer package
   ``` composer global require laravel/valet ```
4. Execute Valet's install command
   ``` valet install ```
5. Register a directory on your machine that contains your application
   ```
   cd ~/Sites // Place where the-news folder is located
   valet park
    ``` 
   Now, the site that was linked may be accessed at ```your-project-folder.test``` this wil be the main url

### Windows
Use [XAMPP](https://www.apachefriends.org/es/download.html)/[WAMPP](https://www.apachefriends.org/es/download.html) or any other local Apache/NGnix/PHP/MySQL package that helps you run a PHP app easily.

If you want to install [Apache](https://httpd.apache.org/docs/current/platform/windows.html)/[NGinx](https://nginx.org/en/download.html), [PHP](https://windows.php.net/download#php-8.1) and [MySQL](https://dev.mysql.com/downloads/installer/) by their own you can also do it.(You must configure your PHP environment by yourself)


## Installation 🔧
1. Navigate on the terminal/cmd to project folder
2. ```npm install```
3. ```composer install```
4. Update the ```.env``` file to include a new database
```
DB_CONNECTION=mysql
DB_HOST=your-host
DB_PORT=your-port
DB_DATABASE=your-database
DB_USERNAME=your-user
DB_PASSWORD=your-password
```
5. Run migrations ``` php artisan migrate  ```
6. Run database seeders (to add dummy data) ``` php artisan db:seed  ```

Now we all set to use the API 


## API
Import [this](..%2F..%2FDesktop%2FThe%20News.postman_collection.json) collection to Postman

### Postman Setup
Replace the initial value column of the ``` apiBaseRoute``` with your local host url
![Captura de pantalla 2022-12-17 a la(s) 20.11.06.png](..%2F..%2FDesktop%2FCaptura%20de%20pantalla%202022-12-17%20a%20la%28s%29%2020.11.06.png)



### Categories
##### Get categories:
```
method: get
url: /api/category
parameters: none
```
##### Create category:
```
method: post
url: /api/category
parameters: name(string, unique, required)
```
##### Update category:
```
method: put
url: /api/category/{id}
parameters: name(string, unique, required)
```
##### Delete category:
```
method: delete
url: /api/category/{id}
parameters: none
```

### Posts
##### Get posts:
```
method: get
url: /api/post
parameters: none
```
##### Create post:
```
method: post
url: /api/post
parameters: 
post_content(required,max characters: 255, string)
links(required, json) example on postman collection,
region(not required, string)
category_id(required, category_id has to exist)
tags(not required, array) example on postman collection
```
##### Update post:
```
method: put
url: /api/category/{id}
parameters: 
post_content(required,max characters: 255, string)
links(required, json) example on postman collection,
region(not required, string)
category_id(required, category_id has to exist)
tags(not required, array) example on postman collection
```
##### Delete posts:
```
method: delete
url: /api/post/{id}
parameters: none
```
##### Search posts:
```
use searchParam to search by region, tags, category name, given links
method: get
url: /api/search/{searchParam}
parameters: none
```

## Frontend
Project home page:

![Captura de pantalla 2022-12-17 a la(s) 20.35.11.png](..%2F..%2FDesktop%2FCaptura%20de%20pantalla%202022-12-17%20a%20la%28s%29%2020.35.11.png)

### Search
Use the input to make a search, this will show the results while typing
![Captura de pantalla 2022-12-17 a la(s) 20.38.10.png](..%2F..%2FDesktop%2FCaptura%20de%20pantalla%202022-12-17%20a%20la%28s%29%2020.38.10.png)

### Pagination
There will show only 10 posts per page, use direction arrows to navigate the results
![Captura de pantalla 2022-12-17 a la(s) 20.39.05.png](..%2F..%2FDesktop%2FCaptura%20de%20pantalla%202022-12-17%20a%20la%28s%29%2020.39.05.png)

Frontend uses API calls to show posts and search.
