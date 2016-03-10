<?php
/**
  @file
  Contains \Drupal\first_module\Controller\FirstController.
*/
   
  namespace Drupal\first_module\Controller;
   
  use Drupal\Core\Controller\ControllerBase;
   
  class FirstController extends ControllerBase {
    public function content() {
    return array(
        '#type' => 'markup',
        '#markup' => t('Hello world'),
      );
    }
  }