<h1 align="center">Namerator Backend</h1>

<p align="center">
<a href="https://github.com/hdytarsn/namerator_frontend">Go Namerator Frontend</a>
    </p>

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/hdytarsn/namerator_backend">
    <img src="http://game.namerator.fun/img/logo/logo-bk.png" alt="Logo" width="350">
  </a>
  <p align="center">
Namerator is a graduation project prepared for the Kodluyoruz-Atölye15 javascript bootcamp. 🎓
    <br />
    <br />
    <a href="http://game.namerator.fun/">View Demo</a>
      <br>
        <p align="center">(You probably cant play on demo because the SSL-Microphone Issues, you can play locally)</p>
  </p>
</p>


<details open="open">
  <summary><h2 style="display: inline-block">Table of Contents</h2></summary>
  <ol>
    <li><a href="#notes">Notes</a></li>
    <li><a href="#built-with">Built With</a></li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#thanks">Thanks</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>


## Notes

This backend project created only api requests and web socket channel connections.
Demo project deployed on http://namerator.fun you can get responses from your local project, http://namerator.fun/api routes (This is set defaul base url for [Nameretor Frontend](https://github.com/hdytarsn/namerator_frontend)).


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
    PUSHER_APP_ID=1111111
    PUSHER_APP_KEY=123123123123
    PUSHER_APP_SECRET=0a1230a12340
    PUSHER_APP_CLUSTER=eu
    -And Set BROADCAST_DRIVER=pusher
   ```
   Atolye15 Project Keys&Ids Below (these will remove soon,added only for Alpcan Aydın)
   
   ```sh
   PUSHER_APP_ID=1179053
    PUSHER_APP_KEY=8cf0e37a457627fb2630
    PUSHER_APP_SECRET=0a146bb1a8f2b0fa36da
    PUSHER_APP_CLUSTER=eu
   ```
   Pusher Email: atolye15@namerator.fun
   Pusher Passwd: JS4Atolye15

7. Migrate the database
    ```sh
   php artisan migrate
   ```

## Thanks!
Special thanks to [Atölye15](https://www.atolye15.com) and [Kodluyoruz](https://www.kodluyoruz.org) 

## Contact
Hidayet Arasan - [Web Site](https://hidayetarasan.com) - info@hidayetarasan.com

