<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sites Controller
 *
 * @property \App\Model\Table\SitesTable $Sites
 */
class SitesController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('empty');
        $site = $this->Sites->get($id, [
            'contain' => []
        ]);

        $this->set('site', $site);
        $this->set('_serialize', ['site']);
    }

}