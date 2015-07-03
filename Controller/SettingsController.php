<?php
App::uses('AppController', 'Controller');
/**
 * Settings Controller
 *
 * @property Setting $Setting
 * @property PaginatorComponent $Paginator
 */
class SettingsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Setting->recursive = 0;
        $this->Paginator->settings = array(
            'contain' => array('Thumb'),
            'conditions'=>array(
                'Setting.name <>' => '0'
            )
        );
        $this->set('settings', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Setting->exists($id)) {
            throw new NotFoundException(__('Invalid setting'));
        }
        $options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
        $this->set('setting', $this->Setting->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $temp = array(
            'Setting' => array(
                'name' => 'temp',
                'key' => 'temp',
            )
        );
        $data = $this->Setting->find('first',array('conditions'=>array('Setting.name'=>'temp')));
        if($data){
            $id = $data['Setting']['id'];
        }else{
            $this->Setting->save($temp);
            $id = $this->Setting->id;
        }
        $this->redirect(Router::url(array('action'=>'edit',$id)));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Setting->exists($id)) {
            throw new NotFoundException(__('Invalid setting'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Setting->save($this->request->data)) {
                $this->Session->setFlash(__('The setting has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The setting could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Setting.' . $this->Setting->primaryKey => $id));
            $this->request->data = $this->Setting->find('first', $options);
        }
        $parents = $this->Setting->ParentSetting->find('list');
        $this->set(compact('parents'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Setting->id = $id;
        if (!$this->Setting->exists()) {
            throw new NotFoundException(__('Invalid setting'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Setting->delete()) {
            $this->Session->setFlash(__('The setting has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The setting could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
