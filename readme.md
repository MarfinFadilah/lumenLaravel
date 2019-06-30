#NOTE
Tes ini saya berhasil kerjakan membuat API menggunakan lumen laravel dengan authentikasi Auth0 di bagian checklist method sesuai dengan dokumentasi https://kw-checklist.docs.stoplight.io/api-reference/checklists/post-checklists
- Create Checklist (Command: createChecklist)
- Update Checklist (Command: updateChecklist/id example: updateChecklist/1 dan post jsonnya raw)
- Delete Checklist (Command: deleteChecklist/id example: deleteChecklist/1)
- Get Checklist (Command: getChecklist/id example: getChecklist/1)
- Get List Of Checklist (Command: getChecklist)

Adapun cara untuk mengakses API ini, bisa dilakukan dengan menggunakan software REST Client seperti postman ataupun dibuat dengan form sendiri. Berikut adalah contoh cara mengetes APInya
CARA 1:
http://localhost:8000/api/authors/deleteChecklist/1
Masukan JSON data(SESUAI DOKUMENTASI) kedalam postman atau dalam form buat textarea
CARA 2:
http://localhost/test-skill-buat-api/public/api/authors/deleteChecklist/1
Masukan JSON data(SESUAI DOKUMENTASI) kedalam postman atau dalam form buat textarea
# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
