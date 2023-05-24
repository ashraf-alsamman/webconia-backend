<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.webconia.de/wp-content/uploads/2020/03/webconia_logo.svg" width="400"></a></p>



 

## About The task (Coding Challenge)

- Back-end (PHP Laravel, MySQL, Docker).
- Frontend (React js, Redux, Redux Toolkit).
- WebSocket for real-time update (Pusher).

## Demo
- You can check the live demo from [here](https://celebrated-gecko-8b0a92.netlify.app/?page=1&perPage=10){:target="_blank"}.
- 
- 
- Postman collection <a href="https://www.postman.com/ashraf-alsamman/workspace/a5d22c07-2317-430e-b7a6-51e2bafc3251/request/733051-02383877-4929-463b-b268-444ce168b707">Postman Collection</a> 
You can update the visitors counter by hitting api with published API with the postman and update the JSON object and you will see immediately the update on front end part.

 <img src='https://i.postimg.cc/3xjbPxK3/webconia.png' border='0' alt='webconia'/> 


## Example JSON Request
```
[
    {
      "title":"Collerys",  
      "AnmeldungenHeute":"12",
      "WebsiteBesucherHeute":"230",
      "users":[
         {
            "name":"Emma",
            "surname":"Thomas"
         }
      ]
   },
      {
      "title":"Duftz",  
      "AnmeldungenHeute":"122",
      "WebsiteBesucherHeute":"201",
      "users":[
         {
            "name":"Sophia",
            "surname":"Joseph"
         }
      ]
   },
      {
      "title":"Belegbote", 
      "AnmeldungenHeute":"302",
      "WebsiteBesucherHeute":"4001",
      "users":[
         {
            "name":"Isabella",
            "surname":"Joseph"
         },
         {
            "name":"Mia",
            "surname":"Ezekiel"
         }
      ]
   },
      {
      "title":"Greetix", 
      "AnmeldungenHeute":"987",
      "WebsiteBesucherHeute":"774",
      "users":[
         {
            "name":"Nora",
            "surname":"Ezekiel"
         }
      ]
   }
   ]
```

## Example Header Request
- signature_header_name `Signature`
- signing_secret `ashraf`

### Tools

- **[Laravel](https://laravel.com/)**
- **[Docker](https://www.docker.com/)**
- **[Nodejs](https://nodejs.org/en/)**
- **[Pusher](https://pusher.com/)**

- **[ReactJs](https://reactjs.org/)**
- **[Redux](https://redux.js.org/)**
- **[Redux-toolkit](https://redux-toolkit.js.org/)**

  
# Steps
- Open wsl2 command line and clone the project
- Rename .env.example to .env
- Install Laravel project on docker:
  `docker run --rm     -u "$(id -u):$(id -g)"     -v $(pwd):/var/www/html     -w /var/www/html     laravelsail/php81-composer:latest     composer update laravel/sail`

- Run the following before the next step (requere) and keep it running 
 `./vendor/bin/sail up`
 
- Open another wsl2 command line run migration 
 `./vendor/bin/sail php artisan migrate`

## Example Header Request
- signature_header_name `Signature`
- signing_secret `ashraf`
- open postman and hit the link [localhost/webhook/create]
   and you can update the data (body of the request like a demo) and check the frontend part
  
### Frontend
- `git clone https://github.com/ashraf-alsamman/webconia-frontend`
- Edit config/confige.js api  
- Run frontend (react js) project
  `yarn install`
  `yarn start`
  

Try localhost/webhook/create
and change data in json object and check frontend part


 

 

 
