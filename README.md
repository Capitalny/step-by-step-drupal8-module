# step-by-step-drupal8-module
Simple code to create drupal 8 'Hello World' module

- Create a new directory in /sites called all
- Inside all create a direcotry modules
- Create the directory called 'first_module' inside the 'modules' directory

Create a info yaml file:
- You need to create an info yaml file to tell Drupal that your module exists. This is similar to creating a .info file in Drupal 7.
- The filename should be the system name of your module with the .info.yml extension. In this case, it will be 'first_module.info.yml'.
- Create 'first_module.info.yml' in side the 'first_module' directory.

Code:
```php
  name: First Module
  description: An experimental module to build our first Drupal 8 module
  package: Custom
  type: module
  version: 1.0
  core: 8.x
```
Create a .module file:
In Drupal 7, the .module is required even if it doesn't contain any code. in Drupal 8, it is optional. I'm going to create one which can be used later if you need to implement hooks.

- Create module file called 'first_module.module' in side the 'first_module' directory.

Create the 'src' directory:
We need to create a sub directory within the 'module' directory for the controllers, plugins, forms, templates and tests. This sub directory should be called 'src', which is short for source. This will allow the controller class to autoload, which means you do not have to explicitly include the class file.

- Create a folder inside the 'first_module' module folder called 'src', which is short for source.

Create a basic controller:
Controllers do most of the work in a typical MVC application. 
Here are the steps to create the basic controller for the module.

- Create a folder within 'src' called 'Controller'.
- Within the 'Controller' folder, create a file called 'FirstController.php'.
- In FirstController.php, we will create a simple “hello world” message so that we know it is working.

```php
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
```

Add a route file:
The controller we created above will not do anything at this stage. We need to wire it up to a route from the URL to the controller in order for it to be executed.

- Create a file called 'first_module.routing.yml'

Add the following code to 'first_module.routing.yml' :

```php
first_module.content:
  path: '/first'
  defaults:
    _controller: 'Drupal\first_module\Controller\FirstController::content'
    _title: 'Hello world'
  requirements:
    _permission: 'access content'
```

View the content:
If you now go to base path of your project and followed by '/first', you will seero the Hello World message that is being returned from the controller.

Create menu link:

The route now works and returns content from the controller. But you’d need to know the URL in order to reach the content. To make this more useful, we need to add it to Drupal’s menu system. To do that, you need to create a menu .yml file.

- In your module root (sites/all/modules/first_module/), create 'first_module.links.menu.yml'
- Add the following code:

```php
first_module.admin:
  title: 'First module settings'
  description: 'A basic module to return hello world'
  parent: system.admin_config_development
  route_name: first_module.content
  weight: 100
```

Clear Cache:
Clear the cache and then you should see the menu item under configuration -> development.

Click on the menu item and it will take you to /first.

And that is it, your first Drupal 8 module with a menu item that returns something!
