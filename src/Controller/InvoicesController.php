<?php
namespace App\Controller;

use App\Controller\AppController;
use DataTables\Controller\DataTablesAjaxRequestTrait;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{

    use DataTablesAjaxRequestTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('DataTables.DataTables');
        $this->DataTables->createConfig('Invoices')
            ->queryOptions(['contain' => [
                    'Customers' => ['fields' => ['Customers__id' => 'Customers.id',
                        'Customers__name' => 'Customers.name']],
                    'InvoiceStatuses' => ['fields' => ['InvoiceStatuses__id' => 'InvoiceStatuses.id',
                        'InvoiceStatuses__name' => 'InvoiceStatuses.name']],
                ]])
            ->column('Invoices.id', ['label' => 'Id', 'visible' => false])
            ->column('Invoices.name', ['label' => 'Name'])
            ->column('Customers.name', ['label' => 'Customer'])
            ->column('InvoiceStatuses.Id', ['label' => 'StatusId', 'visible' => false])
            ->column('InvoiceStatuses.name', ['label' => 'Status'])
            ->column('Invoices.amount', ['label' => 'Amount'])
            ->column('actions', ['label' => 'Actions', 'database' => false]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        /* before datatables
        $this->paginate = [
            'contain' => ['Customers']
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
        */
        $this->DataTables->setViewVars('Invoices');
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Customers', 'InvoiceStatuses']
        ]);

        $this->set('invoice', $invoice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoice = $this->Invoices->newEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $invoice_statuses = $this->Invoices->InvoiceStatuses->find('list');
        $this->set(compact('invoice', 'customers', 'invoice_statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $invoice_statuses = $this->Invoices->InvoiceStatuses->find('list');
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('invoice', 'customers', 'invoice_statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
