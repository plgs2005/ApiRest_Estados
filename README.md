<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Instalação:
Api Rest para consultas de estados e cidades da União Federativa do Brasil, PUT melhor utilizado para visualização dos dados apos todo o processo de instalação:

1 - composer update;
2 - npm install;
3- criar banco de dados mysql para receber os dados com as configurações stadas no arquivo .env
4 - Realizar a migration com o comando: 
 $ php artisam migrate
 
5 - Depois instalar o seeder criado como exemplo:
 $php artisam db:seed

#TESTS
caso tenha algum problema com os testes WEB foi utilizado o comando para instalar o DUSK composer require --dev laravel/dusk

