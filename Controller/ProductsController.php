<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public $helpers = array('Media');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
//        $ps = $this->Product->find('all');
//        foreach($ps as $p){
//            $t = $p;
//            $t['Product']['slug'] = $this->make_slug($t['Product']['name']) .'-'.$t['Product']['id'];
//            $this->Product->save($t);
//        }

        $this->Product->recursive = 0;
        $this->Paginator->settings = array(
            'contain' => array('Thumb'),
            'conditions'=>array(
                'Product.name <>' => '0'
            )
        );
        $this->set('products', $this->Paginator->paginate());
    }
    public function ajax_index()
    {
        if(isset($this->request->query['q'])){
            $settings = array(
                'fields'=>array(
                    'Product.id','Product.name','Product.sku'
                ),
                'conditions'=>array(
                    'Product.name <>' => '0',
                    'Product.name like' => '%'.$this->request->query['q'].'%'
                ),
                'recursive' => -1,
                'limit'=>10
            );
            $products=$this->Product->find('all',$settings);
            $res = array();
            foreach($products as $p){
                $res[] = array(
                    'value' => $p['Product']['id'],
                    'label' => $p['Product']['name'],
                    'sku' =>$p['Product']['sku']
                );
            }
            echo json_encode($res);
        }
        die;
    }
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->set('product', $this->Product->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        $temp = array(
            'Product' => array(
                'sku' => '',
                'provider_id' => '0',
                'name' => '0',
                'price' => '0',
                'retail_price' => '',
                'source_price' => '',
                'excert' => '',
                'descriptions' => '',
                'status' => '0',
                'category_id' => '0'
            )
        );
        if(isset($this->request->query['media_id']))
            $temp['Product']['media_id'] = $this->request->query['media_id'];

        $data = $this->Product->find('first',array('conditions'=>array('Product.sku'=>'')));
        if($data){
            $id = $data['Product']['id'];
        }else{
            $this->Product->save($temp);
            $id = $this->Product->id;
            $this->loadModel('Media');
            $this->Media->save(array(
                    'Media' => array(
                        'id' =>  $this->request->query['media_id'],
                        'ref_id' => $id
                    )
                )
            );
        }
        if(isset($this->request->query['media_id']))
            $this->redirect(Router::url(array('action'=>'edit',$id,'?'=>array('media_id'=>$this->request->query['media_id']))));
        else
            $this->redirect(Router::url(array('action'=>'edit',$id)));
//        if ($this->request->is('post')) {
//            $this->Product->create();
//            debug($this->request->data);die;
//            if ($this->Product->save($this->request->data)) {
//                $this->Session->setFlash(__('The product has been saved.'), 'default', array('class' => 'alert alert-success'));
//                return $this->redirect(array('action' => 'index'));
//            } else {
//                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
//            }
//        }
//        $providers = $this->Product->Provider->find('list');
//        $categories = $this->Product->Category->find('list');
//        $this->set(compact('providers', 'categories'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid product'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Product']['price'] = str_replace(',','',$this->request->data['Product']['price']);
            $this->request->data['Product']['price'] = str_replace(' VNĐ','',$this->request->data['Product']['price']);
            $this->request->data['Product']['retail_price'] = str_replace(',','',$this->request->data['Product']['retail_price']);
            $this->request->data['Product']['retail_price'] = str_replace(' VNĐ','',$this->request->data['Product']['retail_price']);
            $this->request->data['Product']['source_price'] = str_replace(',','',$this->request->data['Product']['source_price']);
            $this->request->data['Product']['source_price'] = str_replace(' VNĐ','',$this->request->data['Product']['source_price']);
            if(empty($this->request->data['Product']['sku']) || $this->request->data['Product']['sku'] == ''){
                $this->request->data['Product']['sku'] = $this->request->data['Product']['id'];
            }
            if(empty($this->request->data['Product']['slug']))
                $this->request->data['Product']['slug'] = $this->make_slug($this->request->data['Product']['name']) .'-'.$this->request->data['Product']['id'];

            if ($this->Product->save($this->request->data)) {
                if(!isset($this->request->data['ProductOption'])){
                    $this->request->data['ProductOption'] = array();
                }
                $product_id = $this->Product->id;
                $this->Product->ProductOption->updateOptions($this->request->data['ProductOption'], $product_id);
                $this->Session->setFlash(__('The product has been saved.'), 'default', array('class' => 'alert alert-success'));
                if(isset($this->request->query['media_id'])){
                    return $this->redirect(array('controller'=>'medias','action' => 'fast_import', 'Product'));
                }
                if($this->request->data['submit'] == 'save'){
                    return $this->redirect(array('action' => 'index'));
                }else{
                    $this->request->data = array();
                    return $this->redirect(array('action' => 'add'));
                }
            } else {
                $this->Session->setFlash(__('The product could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
            $this->request->data = $this->Product->find('first', $options);
        }
        $providers = $this->Product->Provider->find('list');
        $categories = $this->Product->Category->find('list');

        $product_options = $this->Product->ProductOption->Option->find('all');
        $option_groups = $this->Product->ProductOption->Option->OptionGroup->find('list');
        $option_cats = $this->Product->ProductOption->Option->OptionCat->find('list');
        $product_options = Set::combine($product_options,'{n}.Option.id','{n}','{n}.OptionGroup.name');
        $this->set(compact('providers', 'categories','product_options','option_cats','option_groups'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid product'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('The product has been deleted.'), 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Session->setFlash(__('The product could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
