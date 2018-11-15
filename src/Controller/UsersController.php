<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use function MongoDB\BSON\toJSON;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{
    public function index()
    {
        //Here are no operations I just go to the template. There will be a lot o JavaScript
        //Take a look at the changes in Application.php. I commented the security plugin
    }

    public function add(){

        $data = $this->getRequest()->getData("users");
        $this->log($data);

        foreach ($data as $user){
            $entity = $this->Users->newEntity();
            $entity->set("name", $user[0]);
            $entity->set("age", $user[1]);
            $this->Users->save($entity);
        }




        $this->viewBuilder()->setLayout("ajax");
    }

}
