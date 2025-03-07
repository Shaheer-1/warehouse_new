<?php
declare(strict_types=1);

namespace App\Controller;

// use CakePdf\View\PdfView;
// use QrCode\QrCode;

// use CakePdf\Pdf\CakePdf;
/**
 * Cells Controller
 *
 */
class CellsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cells
        ->find('all')
        ->contain([
            'RackRows',
            'Products'=> ['Principals']
        ]);
        // ->leftJoinWith('Products');
        $cells = $this->paginate($query);
        // pr($cells);exit;
        $this->set(compact('cells'));
    }

    /**
     * View method
     *
     * @param string|null $id Cell id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cell = $this->Cells->get($id, contain: [
            'RackRows', 'Products'=> ['Principals']
        ]);
        $this->set(compact('cell'));
    }
    
    public function cellinfo($id = null)
    {
        $cell = $this->Cells->get($id, contain: [
            'RackRows', 'Products'=> ['Principals']
        ]);
        $this->set(compact('cell'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            foreach ($this->request->getData()['cell_code'] as $key => $value) {
                $cell = $this->Cells->newEmptyEntity();
                
                # code...
                $id = $this->Cells->find('list', valueField: 'id')
                ->where(['cell_code' => trim($value)])
                ->first();
                if(!empty($id)){
                    $dataSet = [
                        'id' => $id,
                    ];
                }
                $dataSet = [
                    'cell_code' => trim($value),
                    'rack_row_id' => $this->request->getData()['rack_row_id'],
                    'sku' => $this->request->getData()['sku'][$key],
                    'principal_id' => $this->request->getData()['principal_id'][$key],
                    'product_details' => $this->request->getData()['product_details'][$key],
                    'products' => [
                        'sku' => $this->request->getData()['sku'][$key],
                        'principal_id' => $this->request->getData()['principal_id'][$key],
                        'product_details' => $this->request->getData()['product_details'][$key],
                    ],
                ];
                $cell = $this->Cells->patchEntity($cell, $dataSet,[
                ]);
                
                if ($this->Cells->save($cell)) {
                    $id = $this->Cells->Products->find('list', valueField: 'id')
                    ->where(['Products.sku' => trim($dataSet['sku'])])
                    ->first();
                    if(!empty($id)){
                        $dataSet['products']['id'] = $id;
                        $product = $this->Cells->Products->get($id);
                    }else {
                        # code...
                        $product = $this->Cells->Products->newEmptyEntity();
                        $product = $this->Cells->Products->patchEntity($product,$dataSet['products']);
                        if($this->Cells->Products->save($product)){
                        }
                    }
                    $this->Cells->Products->link($cell,[
                        $product
                    ]);
                    $this->Flash->success(__('The cell has been saved with products.'));
                }
                else{
                    $id = $this->Cells->Products->find('list', valueField: 'id')
                    ->where(['Products.sku' => trim($dataSet['sku'])])
                    ->first();
                    $cell_id = $this->Cells->find('list', valueField: 'id')
                    ->where(['Cells.cell_code' => trim($dataSet['cell_code'])])
                    ->first();
                    $cell = $this->Cells->get($cell_id);
                    if(!empty($id)){
                        $dataSet['products']['id'] = $id;
                        $product = $this->Cells->Products->get($id);
                    }else {
                        # code...
                        $product = $this->Cells->Products->newEmptyEntity();
                        $product = $this->Cells->Products->patchEntity($product,$dataSet['products']);
                        
                        if($this->Cells->Products->save($product)){
                            $this->Cells->Products->link($cell,[
                                $product
                            ]);
                            $this->Flash->success(__('The cell has been saved with products.'));
                        }
                    }
                    $this->Cells->Products->link($cell,[
                        $product
                    ]);
                    $this->Flash->error(__('The cell could not be saved. Please, try again.'));
                }
            }
            return $this->redirect(['action' => 'index']);
        }
        else{
            $cell = $this->Cells->newEmptyEntity();
        }
        $rackRows = $this->Cells->RackRows->find('list', limit: 200)->all();
        $products = $this->Cells->Products->find('list',limit:200)->all();
        $principals = $this->Cells->Products->Principals->find('list',limit:200)->all();
        $this->set(compact('cell', 'rackRows', 'products', 'principals'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cell id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cell = $this->Cells->get($id, contain: [
            'Products','RackRows'
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cell = $this->Cells->patchEntity($cell, $this->request->getData());
            $cell->is_edit = 'edit';
            if ($this->Cells->save($cell)) {
                $this->Flash->success(__('The cell has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cell could not be saved. Please, try again.'));
        }
        $products = $this->Cells->Products->find('list',limit:200)->all();
        $rackRows = $this->Cells->RackRows->find('list', limit: 200)->all();
        $this->set(compact('cell','rackRows','products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cell id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $CellsProductsTable = $this->getTableLocator()->get('CellsProducts');
        $entity = $CellsProductsTable->get($id); 
        if ($CellsProductsTable->delete($entity)) {
            $this->Flash->success(__('The cell has been deleted.'));
        } else {
            $this->Flash->error(__('The cell could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
