<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use \Ceeram\Blame\Controller\BlameTrait;
use Maiorano\Shortcodes\Manager;
use Maiorano\Shortcodes\Library;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    use BlameTrait;

    public $helpers = [
        'Html' => [
            'className' => 'Bootstrap.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap.BootstrapForm'
        ],
        'Paginator' => [
            'className' => 'Bootstrap.BootstrapPaginator'
        ],
        'Modal' => [
            'className' => 'Bootstrap.BootstrapModal'
        ]
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
            // 'unauthorizedRedirect' => ['prefix' => false,'controller' => 'Users', 'action' => 'dashboard'],
            'loginAction' => ['prefix' => 'admin', 'controller' => 'Users', 'action' => 'login'],
            // 'authenticate' => [
            //     'Form' => [
            //         'fields' => ['username' => 'email', 'password' => 'password']
            //     ]
            // ],
        ]);

        $this->shortcodesManager = new Manager\ShortcodeManager;
        $this->registerShortcodes();
        $this->set('shortcodesManager',$this->shortcodesManager);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    /**
    * register your shortcodes here
    *    $example = new Library\SimpleShortcode('example', ['foo'=>'bar'], function($content=null, array $atts=[]){
    *         return $content.$atts['foo'];
    *     });
    *     $this->shortcodesManager->register($example);
    */
    private function registerShortcodes() {

    }

    public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        if (empty($this->request->params['prefix'])) {
            return true;
        }

        // Only admins can access admin functions
        if ($this->request->params['prefix'] === 'admin') {
            return $user !== null ? true : false ;
        }

        // Default deny
        return false;
    }
}
