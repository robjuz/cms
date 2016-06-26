<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Sites Controller
 *
 * @property \App\Model\Table\SitesTable $Sites
 */
class SitesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sites = $this->paginate($this->Sites);

        $this->set(compact('sites'));
        $this->set('_serialize', ['sites']);
    }


    /**
     * Add/Edit method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if ($id !== null) {
            $site = $this->Sites->get($id, [
                'contain' => []
            ]); 
        } else {
            $site = $this->Sites->newEntity();
            $site->status = 0;
            $this->Sites->save($site);
            return $this->redirect(['action'=>'edit', $site->id]);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $site = $this->Sites->patchEntity($site, $this->request->data);
            if ($this->Sites->save($site)) {
                $this->Flash->success(__('The site has been saved.'));
                return $this->redirect(['controller' => 'Sites', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The site could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('site'));
        $this->set('_serialize', ['site']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Site id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $site = $this->Sites->get($id);
        if ($this->Sites->delete($site)) {
            $this->Flash->success(__('The site has been deleted.'));
        } else {
            $this->Flash->error(__('The site could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
