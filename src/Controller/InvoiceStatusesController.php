<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InvoiceStatuses Controller
 *
 * @property \App\Model\Table\InvoiceStatusesTable $InvoiceStatuses
 *
 * @method \App\Model\Entity\InvoiceStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoiceStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $invoiceStatuses = $this->paginate($this->InvoiceStatuses);

        $this->set(compact('invoiceStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Status id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceStatus = $this->InvoiceStatuses->get($id, [
            'contain' => ['Invoices']
        ]);

        $this->set('invoiceStatus', $invoiceStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoiceStatus = $this->InvoiceStatuses->newEntity();
        if ($this->request->is('post')) {
            $invoiceStatus = $this->InvoiceStatuses->patchEntity($invoiceStatus, $this->request->getData());
            if ($this->InvoiceStatuses->save($invoiceStatus)) {
                $this->Flash->success(__('The invoice status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice status could not be saved. Please, try again.'));
        }
        $this->set(compact('invoiceStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceStatus = $this->InvoiceStatuses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceStatus = $this->InvoiceStatuses->patchEntity($invoiceStatus, $this->request->getData());
            if ($this->InvoiceStatuses->save($invoiceStatus)) {
                $this->Flash->success(__('The invoice status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice status could not be saved. Please, try again.'));
        }
        $this->set(compact('invoiceStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceStatus = $this->InvoiceStatuses->get($id);
        if ($this->InvoiceStatuses->delete($invoiceStatus)) {
            $this->Flash->success(__('The invoice status has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
