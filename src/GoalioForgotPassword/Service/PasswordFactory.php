<?php

namespace GoalioForgotPassword\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PasswordFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Password(
            $serviceLocator->get('goaliomailservice_message'),
            $serviceLocator->get('zfcuser_user_mapper'),
            $serviceLocator->get('goalioforgotpassword_password_mapper'),
            $serviceLocator->get('goalioforgotpassword_module_options'),
            $serviceLocator->get('zfcuser_module_options')
        );
    }
}
