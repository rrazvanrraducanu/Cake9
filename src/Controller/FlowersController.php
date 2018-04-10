<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Flowers Controller
 *
 *
 * @method \App\Model\Entity\Flower[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FlowersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
  
   $var1="";
   $var2="";
   if(isset($_POST["text1"])){
       $var1=$_POST["text1"];
   }
 else {
       $var1=""; 
   }
if(isset($_POST["submit"])){

   $radio=$_POST["letter"];
   if($radio=='lower'){
       $var2=strtolower($var1);
   }elseif($radio=='upper'){
        $var2=strtoupper($var1);
   }
   }
   $this->set('var2',$var2);
  $this->set('var1',$var1);
 
   }

    /**
     * View method
     *
     * @param string|null $id Flower id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flower = $this->Flowers->get($id, [
            'contain' => []
        ]);

        $this->set('flower', $flower);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flower = $this->Flowers->newEntity();
        if ($this->request->is('post')) {
            $flower = $this->Flowers->patchEntity($flower, $this->request->getData());
            if ($this->Flowers->save($flower)) {
                $this->Flash->success(__('The flower has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flower could not be saved. Please, try again.'));
        }
        $this->set(compact('flower'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flower id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flower = $this->Flowers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flower = $this->Flowers->patchEntity($flower, $this->request->getData());
            if ($this->Flowers->save($flower)) {
                $this->Flash->success(__('The flower has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flower could not be saved. Please, try again.'));
        }
        $this->set(compact('flower'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Flower id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flower = $this->Flowers->get($id);
        if ($this->Flowers->delete($flower)) {
            $this->Flash->success(__('The flower has been deleted.'));
        } else {
            $this->Flash->error(__('The flower could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
