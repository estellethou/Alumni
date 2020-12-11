# Coding Academy - Alumni  

## Presentation
"Coding Academy - Alumni" is a website for current and former student of the Coding Academy. 
It's divided into 6 sections : 
  - Profile: each user can add a description, uploads profile image and resume (using AWS), display their contact details (email, phone number, linkedIn, github ...)
  - Buisiness section: this page is made for recruiters who want to post an ads in exchange of payment (using Stripe). They don't have to register and only have access to Buisiness section and Home page 
  - Directory: Display all users registered with contact details. Search bar included. Possibility to see other profile
  - Job & Internship: All users registered (alumni and current student) can post jobs/internship ads. API Google is used to locate jobs places
  - Forum: Users can create  blog and interact through comments
  - Event: Users can plan event (date, location, description, number of people attending this event)
Additionally, an complete admin CRUD is available in the backend. All items can be edited, deleted and added and they are displayed in a smooth dashboard
  
## Stack 
<br/>Frontend: VueJS - Javascript (using Vuetify library)
<br/>Backend: Laravel - PHP (Restful CRUD API)
<br/>Local usage : MAMP (MySQL, Apache, PHP)
<br/>Cloud platform: Heroku using add-ons ClearDB, AWS 
<br/>API : Stripe, Google api

## Installation for local usage

### For the Backend

#### Install ```PHP``` on MacOS : https://getgrav.org/blog/macos-bigsur-apache-multiple-php-versions
```bash
brew tap shivammathur/php
brew install shivammathur/php/php@7.4
```
#### Install composer
```bash 
brew install composer
```

#### Install ```MAMP``` on MacOS : https://www.mamp.info/en/windows/
Change setting port: Apache Port: 8899 and MySQL Port: 8889

#### Git clone repository 
In MAMP folder, go to folder ```htdocs```. Inside, git clone this repository. 

##### Backend Alumni (Laravel project)
In .env file in the Laravel project "Alumni" make sure that all parameters are confifured like that:
<br/>DB_CONNECTION=mysql
<br/>DB_HOST=127.0.0.1
<br/>DB_PORT=8889
<br/>DB_DATABASE=alumni
<br/>DB_USERNAME=alumni
<br/>DB_PASSWORD=alumni

In PHP MyAdmin in MAMP application, create a new DB called "alumni". 

#### Install library
At the root of the backend project, read composer.json, package.json and install all libraries 
```bash
composer install 
npm install
php artisan migrate
```

#### Compiles (admin page)
Run MAMP server 
Then go to : 

```bash
http://localhost:8899/C-DEV-130-PAR-1-1-ecp-estelle.thou/Alumni/public/admin/login
```
Or start your localhost server in CLI

```bash
php artisan serve 
```

### For the Frontend

#### Install library
At the root of the frontend project, read package.json and install all libraries 

```bash
npm install 
```

#### Compiles

```bash
npm run serve 
```

Then open a browser with the url :
```bash 
http://127.0.0.1:8000/
```

## Installation with cloud platform 
We use  ```HEROKU``` (https://devcenter.heroku.com/articles/git)
```bash
cd Alumni
git init
git add .
git commit -m "My first commit"
heroku create
```
You can use the git remote command to confirm that a remote named heroku has been set for your app:

```bash
git remote -v 
```

You deploy your code running 
```bash
git push heroku master
```
Do the same for deploying frontend project 

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Tutorial 
Here are tutorials on which we based our project :
<br/> [Vue Authentication: Introduction (1/12)](https://www.youtube.com/watch?v=Vd1YwbHrY1Q&list=PLfdtiltiRHWF1jqLcNO_2jWJXj9RuSDvY&ab_channel=Codecourse)
<br/> [[Lesson 17] Laravel Mix (Whoa) Webpack explanation](https://www.youtube.com/watch?v=3Pu6QJTWZBY)
<br/> [CORS Error & Solutions In A Nutshell [Cross Origin Resource Sharing]](https://www.youtube.com/watch?v=gPzMRoPDrFk&ab_channel=SoftAuthor)
<br/> [Vue 2.0 and Laravel 5.3 #23 Uploading an Image](https://www.youtube.com/watch?v=0Kbs701dXg0)
