<?php

require_once(dirname(__DIR__).'/IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('1c2DE3yHsEjJ3rbAAYGQHKnItQedLTys');
        $options->setSecretKey('hi2Ofd9AiZe52ubUA7CX5fJDaUv9UBBp');
        $options->setBaseUrl('https://api.iyzipay.com');

        return $options;
    }
}