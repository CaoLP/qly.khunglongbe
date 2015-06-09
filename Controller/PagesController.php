<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *   or MissingViewException in debug mode.
 */
	public function display() {
//		$path = func_get_args();
//
//		$count = count($path);
//		if (!$count) {
//			return $this->redirect('/');
//		}
//		$page = $subpage = $title_for_layout = null;
//
//		if (!empty($path[0])) {
//			$page = $path[0];
//		}
//		if (!empty($path[1])) {
//			$subpage = $path[1];
//		}
//		if (!empty($path[$count - 1])) {
//			$title_for_layout = Inflector::humanize($path[$count - 1]);
//		}
//		$this->set(compact('page', 'subpage', 'title_for_layout'));
//
//		try {
//			$this->render(implode('/', $path));
//		} catch (MissingViewException $e) {
//			if (Configure::read('debug')) {
//				throw $e;
//			}
//			throw new NotFoundException();
//		}
	}
    public function use_debug(){
        if($this->Session->check('use_debug') && $this->Session->read('use_debug')){
            $this->Session->write('use_debug',false);
        }else{
            $this->Session->write('use_debug',true);
        }
        return $this->redirect($this->referer());
    }
    public function import_product(){
        App::import('Vendor', 'simple_html_dom');
        $html = file_get_html('http://haicaubeo.com/Home.aspx?categoryId=21');
        echo($html);die;
        $data = $html->find('*[id="ctl00_body_grid"] tbody table a');
        foreach($data as $d){
            $child = file_get_html('http://haicaubeo.com/'.$d->href);
            $title_xpath = '//*[@id="ctl00_body_grid"]/tbody/tr/td/table/tbody/tr[1]/td/span';
            $price_xpath = '//*[@id="ctl00_body_grid"]/tbody/tr/td/table/tbody/tr[3]/td[2]/span';
            $sku_xpath = '//*[@id="ctl00_body_grid"]/tbody/tr/td/table/tbody/tr[4]/td[2]';
            $img_xpath = '//*[@id="ctl00_body_grid"]/tbody/tr/td/table/tbody/tr[2]/td/div/img';
            $content_xpath = '//*[@id="ctl00_body_grid"]/tbody/tr/td/table/tbody/tr[10]/td/table/tbody/tr/td';

            $title = $child->find($title_xpath,0)->innertext;
            $price = $child->find($price_xpath,0)->innertext;
            $sku= $child->find($sku_xpath,0)->innertext;
            $img = $child->find($img_xpath,0)->src;
            $content = $child->find($content_xpath,0)->innertext;

            $title = trim($title);
            $price = trim($price);
            $sku = trim($sku);
            $img = trim($img);
            $content = trim($content);

            debug($img);
            die;
        }
        die;

    }
    function addToFiles($key, $url)
    {
        $tempName = tempnam('/tmp', 'php_files');
        $originalName = basename(parse_url($url, PHP_URL_PATH));

        $imgRawData = file_get_contents($url);
        file_put_contents($tempName, $imgRawData);
        $_FILES[$key] = array(
            'name' => $originalName,
            'type' => mime_content_type($tempName),
            'tmp_name' => $tempName,
            'error' => 0,
            'size' => strlen($imgRawData),
        );
//        array(
//            'Media' => array(
//                'ref' => 'Product',
//                'ref_id' => '1',
//                'file' => array(
//                    'name' => '7adaf2.png',
//                    'type' => 'image/png',
//                    'tmp_name' => '/tmp/phpHfD0Zl',
//                    'error' => (int) 0,
//                    'size' => (int) 576641
//                )
//            )
//        )
    }
}
