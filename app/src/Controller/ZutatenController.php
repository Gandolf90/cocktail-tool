<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Zutaten Controller
 *
 * @property \App\Model\Table\ZutatenTable $Zutaten
 * @method \App\Model\Entity\Zutaten[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ZutatenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $zutaten = $this->paginate($this->Zutaten);

        $this->set(compact('zutaten'));
    }

    /**
     * View method
     *
     * @param string|null $id Zutaten id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zutaten = $this->Zutaten->get($id, [
            'contain' => ['Rezepte'],
        ]);

        $this->set(compact('zutaten'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zutaten = $this->Zutaten->newEmptyEntity();
        if ($this->request->is('post')) {
            $zutaten = $this->Zutaten->patchEntity($zutaten, $this->request->getData());
            if ($this->Zutaten->save($zutaten)) {
                $this->Flash->success(__('The zutaten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zutaten could not be saved. Please, try again.'));
        }
        $rezepte = $this->Zutaten->Rezepte->find('list', ['limit' => 200])->all();
        $this->set(compact('zutaten', 'rezepte'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Zutaten id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zutaten = $this->Zutaten->get($id, [
            'contain' => ['Rezepte'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zutaten = $this->Zutaten->patchEntity($zutaten, $this->request->getData());
            if ($this->Zutaten->save($zutaten)) {
                $this->Flash->success(__('The zutaten has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zutaten could not be saved. Please, try again.'));
        }
        $rezepte = $this->Zutaten->Rezepte->find('list', ['limit' => 200])->all();
        $this->set(compact('zutaten', 'rezepte'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Zutaten id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zutaten = $this->Zutaten->get($id);
        if ($this->Zutaten->delete($zutaten)) {
            $this->Flash->success(__('The zutaten has been deleted.'));
        } else {
            $this->Flash->error(__('The zutaten could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
