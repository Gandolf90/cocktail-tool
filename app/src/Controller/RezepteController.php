<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Rezepte Controller
 *
 * @property \App\Model\Table\RezepteTable $Rezepte
 * @method \App\Model\Entity\Rezepte[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RezepteController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $rezepte = $this->paginate($this->Rezepte);

        $this->set(compact('rezepte'));
    }

    /**
     * View method
     *
     * @param string|null $id Rezepte id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rezepte = $this->Rezepte->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('rezepte'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rezepte = $this->Rezepte->newEmptyEntity();
        if ($this->request->is('post')) {
            $rezepte = $this->Rezepte->patchEntity($rezepte, $this->request->getData());
            if ($this->Rezepte->save($rezepte)) {
                $this->Flash->success(__('The rezepte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rezepte could not be saved. Please, try again.'));
        }
        $this->set(compact('rezepte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rezepte id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rezepte = $this->Rezepte->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rezepte = $this->Rezepte->patchEntity($rezepte, $this->request->getData());
            if ($this->Rezepte->save($rezepte)) {
                $this->Flash->success(__('The rezepte has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rezepte could not be saved. Please, try again.'));
        }
        $this->set(compact('rezepte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rezepte id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rezepte = $this->Rezepte->get($id);
        if ($this->Rezepte->delete($rezepte)) {
            $this->Flash->success(__('The rezepte has been deleted.'));
        } else {
            $this->Flash->error(__('The rezepte could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
