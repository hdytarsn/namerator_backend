<h1 align="center">Namerator Backend</h1>

<p align="center">
<a href="https://github.com/hdytarsn/namerator_frontend">Go Namerator Frontend</a>
    </p>

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/hdytarsn/namerator_backend">
    <img src="https://game.namerator.fun/img/logo/logo-bk.png" alt="Logo" width="350">
  </a>
<p align="center"><b>(In Development)</b><p>
      
<p align="center">"Namerator" is a simple name finding game that you can play multiplayer or single player.<br>
It's a weekend project to develop myself in different technologies <a href="#built-with">see below</a>.
    <br />
    <br />
    <a href="https://game.namerator.fun/">View Demo</a>
  </p>
</p>


<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li><a href="#notes">Notes</a></li>
    <li><a href="#built-with">Built With</a></li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>


## Notes

This backend project created only api requests and web socket channel connections.
Demo project deployed on https://namerator.fun so you can get responses from your local with https://namerator.fun/api routes (default base url for [Nameretor Frontend](https://github.com/hdytarsn/namerator_frontend)).


## Built With

* [Laravel](https://laravel.com/)
* [Sanctum (For Api Authentication)](https://github.com/laravel/sanctum)
* [Pusher (For WebSockets)](https://pusher.com/)
* [MySql (Project Database)](https://www.mysql.com/)


### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/hdytarsn/namerator_backend
   ```
    ```sh
    cd namerator_backend
   ```
2. Install Composer packages
   ```sh
   composer install
   ```
3. Create a .env file and generate application-key
   ```sh
    cp .env.example .env
   ```
   ```sh
   php artisan key:generate
   ```
4. Enter your database credentials
 ```sh
    DB_DATABASE=namerator
    DB_USERNAME=user
    DB_PASSWORD=secret
   ```
4. Enter your web socket credentials
 ```sh
    PUSHER_APP_ID=****
    PUSHER_APP_KEY=****
    PUSHER_APP_SECRET=****
    PUSHER_APP_CLUSTER=****
    BROADCAST_DRIVER=pusher
   ```
   
7. Migrate the database
    ```sh
   php artisan migrate
   ```

## Thanks!
Special thanks to [Atölye15](https://www.atolye15.com) for evaluating the code and project idea, and [Kodluyoruz](https://www.kodluyoruz.org) for the best JavaScript bootcamp!

## Contact
Hidayet Arasan - [Web Site](https://hidayetarasan.com) - info@hidayetarasan.com

