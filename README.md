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
Import this collection to Postman:

```
{
	"info": {
		"_postman_id": "ebd385cd-6eb7-4867-919b-09896bf5d306",
		"name": "The News",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Categories",
			"item": [
				{
					"name": "Get Categories",
					"request": {
						"method": "GET",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"url": {
							"raw": "{{apiBaseRoute}}/api/category",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"category"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create Category",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "name",
									"value": "Compras y adquisiciones",
									"type": "default"
								}
							]
						},
						"url": {
							"raw": "{{apiBaseRoute}}/api/category",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"category"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update Category",
					"request": {
						"method": "PUT",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							},
							{
								"key": "Content-Type",
								"value": "multipart/form-data",
								"type": "default",
								"disabled": true
							}
						],
						"body": {
							"mode": "urlencoded",
							"urlencoded": [
								{
									"key": "name",
									"value": "Cooperacionesx",
									"type": "default"
								}
							]
						},
						"url": {
							"raw": "{{apiBaseRoute}}/api/category/1",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"category",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete Category",
					"request": {
						"method": "DELETE",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"url": {
							"raw": "{{apiBaseRoute}}/api/category/52",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"category",
								"52"
							]
						}
					},
					"response": []
				}
			]
		},
		{
			"name": "Posts",
			"item": [
				{
					"name": "Create Post",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "links",
									"value": "{\"links\": [{\"url\": \"www.google.com\", \"short\": \"SteticNews.com\"}]}",
									"type": "default"
								},
								{
									"key": "post_content",
									"value": "Test Content",
									"type": "default"
								},
								{
									"key": "category_id",
									"value": "2",
									"type": "default"
								},
								{
									"key": "tags[0]",
									"value": "tag1",
									"type": "default"
								},
								{
									"key": "tags[1]",
									"value": "tag2",
									"type": "default"
								},
								{
									"key": "region",
									"value": "Mexico",
									"type": "default"
								}
							]
						},
						"url": {
							"raw": "{{apiBaseRoute}}/api/post",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"post"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update Post",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": [
								{
									"key": "post_content",
									"value": "dsdsdsd",
									"type": "default"
								},
								{
									"key": "links",
									"value": "{\"links\": [{\"url\": \"www.google.com\", \"short\": \"SteticNews.com\"}]}",
									"type": "default"
								},
								{
									"key": "category_id",
									"value": "2",
									"type": "default"
								},
								{
									"key": "tags[0]",
									"value": "test",
									"type": "default"
								}
							]
						},
						"url": {
							"raw": "{{apiBaseRoute}}/api/post/1?_method=PUT",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"post",
								"1"
							],
							"query": [
								{
									"key": "_method",
									"value": "PUT"
								}
							]
						}
					},
					"response": []
				},
				{
					"name": "Get Post",
					"request": {
						"method": "GET",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"url": {
							"raw": "{{apiBaseRoute}}/api/post",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"post"
							],
							"query": [
								{
									"key": "page",
									"value": "2",
									"disabled": true
								}
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete Post",
					"request": {
						"method": "DELETE",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"url": {
							"raw": "{{apiBaseRoute}}/api/post/1",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"post",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Search",
					"protocolProfileBehavior": {
						"disableBodyPruning": true
					},
					"request": {
						"method": "GET",
						"header": [
							{
								"key": "Accept",
								"value": "application/json",
								"type": "default"
							}
						],
						"body": {
							"mode": "formdata",
							"formdata": []
						},
						"url": {
							"raw": "{{apiBaseRoute}}/api/search/com",
							"host": [
								"{{apiBaseRoute}}"
							],
							"path": [
								"api",
								"search",
								"com"
							]
						}
					},
					"response": []
				}
			]
		}
	],
	"event": [
		{
			"listen": "prerequest",
			"script": {
				"type": "text/javascript",
				"exec": [
					""
				]
			}
		},
		{
			"listen": "test",
			"script": {
				"type": "text/javascript",
				"exec": [
					""
				]
			}
		}
	],
	"variable": [
		{
			"key": "apiBaseRoute",
			"value": "http://the-news.test",
			"type": "default"
		}
	]
}
```

### Postman Setup
Replace the initial value column of the ``` apiBaseRoute``` with your local host url

![Captura de pantalla 2022-12-17 a la(s) 20 11 06](https://user-images.githubusercontent.com/35705713/208317290-d6257e50-cd05-4a5b-8e6e-d41dd9bca0ff.png)



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
Run the following command:
```
npm run dev
```

Project home page:

![Captura de pantalla 2022-12-17 a la(s) 20 35 11](https://user-images.githubusercontent.com/35705713/208317310-d8fc44a9-e0db-4811-a73c-a53d7b2579b3.png)


### Search
Use the input to make a search, this will show the results while typing, you can search by region, links, category name, and tags

![Captura de pantalla 2022-12-17 a la(s) 20 38 10](https://user-images.githubusercontent.com/35705713/208317313-67a4112e-9919-43b1-ac54-15c97af74a17.png)

### Pagination
There will show only 10 posts per page, use direction arrows to navigate the results
![Captura de pantalla 2022-12-17 a la(s) 20.39.05.png](..%2F..%2FDesktop%2FCaptura%20de%20pantalla%202022-12-17%20a%20la%28s%29%2020.39.05.png)

Frontend uses API calls to show posts and search.
