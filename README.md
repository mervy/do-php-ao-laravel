# Do PHP ao Laravel

Framework feito com PHP Puro levando-se como base o Framework Laravel

- [Laravel](https://laravel.com) - Site oficial do Laravel
- [Do PHP ao Laravel - Clube Full-Stack](https://www.youtube.com/playlist?list=PLyugqHiq-SKe-0fXtI9t_IK3sRD9_VOXe) - Url do Curso
- [Repositório do Projeto](https://github.com/aleduca/php-to-laravel)

- **db_complete.zip:** banco de dados fake com dados randômicos para o banco de dados
- **db_structure.sql:** Contém somente a estrutura da tabela a ser usada. Banco de dados: `do-php-ao-laravel`
- **utf8mb4_unicode_520_ci:** Baseado em uma versão mais recente do padrão Unicode (versão 5.2.0), oferecendo ainda mais precisão em ordenações e comparações linguísticas em alguns casos. Pode ser útil se você precisar de suporte para as regras de comparação mais recentes.

- Namespace será chamado de `Kurama` - 9 caudas do Naruto 

- Branchs: principal será a `main`, depois terá a `dev` e outras como `feat/sendMail`, `feat/crud` etc

- Comandos utilizados:
```bash
$ composer init
$ composer require --dev symfony/var-dumper
$ composer require vlucas/phpdotenv
$ composer require spatie/ignition
$ composer require php-di/php-di
```

- Para configurar o ignition [Site - Ignition ](https://flareapp.io/ignition):

- Instalar com `composer require spatie/ignition`
- Colocar o seguinte código em `app.php`:
```php

Ignition::make()
    ->setTheme('dark')  //dark, light
    ->shouldDisplayException(env('ENV') === 'development')
    ->register();
```
O parâmetro `->shouldDisplayException()` deve ser **true** ou **false**. Então está sendo vinculado ao .env onde serão usadas as opções
`development` aparecendo o erro e `production` onde mudaria para false, não mostrando o erro.

- Para que em produçção não fique uma tela em branco, trabalhar essa lógica no  `Router.php`:
```php
if(!class_exists($controller) || !method_exists($controller, $action)){
    $error = match(env('ENV')) {
    "development" => throw new ControllerNotFoundException("[$controller::$action] does not exist"),
    "production" => http_response_code(501)
    };
    return $error;            
}
```


