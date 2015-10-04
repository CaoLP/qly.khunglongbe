<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
    public $actsAs = array('Trackable');

    public function getNextAutoNumber($model){
        $result = $model->query("
                            SELECT Auto_increment
                            FROM information_schema.tables AS NextId
                            WHERE table_name='".$model->table."'
                            AND table_schema='".$model->getDataSource()->config['database']."'
                            ");
        return !empty($result[0]['NextId']['Auto_increment']) ? $result[0]['NextId']['Auto_increment'] : 1;
    }
}
