<?php

namespace Kurama\Core\Library;

use DI\Container;
use Dotenv\Dotenv;
use DI\ContainerBuilder;
use Spatie\Ignition\Ignition;

class App
{
    public readonly Container $container;

    public static function create(): self
    {
        return new self();
    }

    public function withShowErrorsForDebug()
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        return $this;
    }

    public function withSetTimeZone()
    {
        date_default_timezone_set('America/Sao_Paulo');
        return $this;
    }

    public function withErrorPage()
    {
        Ignition::make()
            ->setTheme('dark')  //dark, light
            //Change to production to hide the error page.
            ->shouldDisplayException(env('ENV') === 'development')
            ->register();
        return $this;
    }

    public function withContainer()
    {
        $builder = new ContainerBuilder();
        $this->container = $builder->build();
        return $this;
    }
    public function withEnvironmentVariables()
    {
        try {
            $dotenv = Dotenv::createImmutable(dirname(__FILE__, 3));
            $dotenv->load();
            return $this;            
        } catch (\Throwable $th) {
           echo $th->getMessage(); //Error when.env file is not found.
        }

    }
}
