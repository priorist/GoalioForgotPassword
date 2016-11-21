<?php

namespace GoalioForgotPassword\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory used to instantiate the forgot controller
 */
class ForgotControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // Fetch global service locator first, since every controller has its own
        $parentLocator = $serviceLocator->getServiceLocator();

        $userService     = $parentLocator->get('zfcuser_user_service');
        $passwordService = $parentLocator->get('goalioforgotpassword_password_service');
        $options         = $parentLocator->get('goalioforgotpassword_module_options');
        $zfcUserOptions  = $parentLocator->get('zfcuser_module_options');
        $forgotForm      = $parentLocator->get('goalioforgotpassword_forgot_form');
        $resetForm       = $parentLocator->get('goalioforgotpassword_reset_form');

        return new ForgotController(
            $userService,
            $passwordService,
            $options,
            $zfcUserOptions,
            $forgotForm,
            $resetForm
        );
    }
}
