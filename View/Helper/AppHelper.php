<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
    public function format_money($price){
        if(empty($price)){
            return 0;
        }
        return number_format($price, 0, '.', ',');
    }
    public function genOptions($options){
        $result = array();
        foreach($options[array_keys($options)[0]] as $optionGroupOne){
            $temp = array(
                'name' => array($optionGroupOne['Option']['name']),
                'option' => array($optionGroupOne['Option']['id']),
            );
            $data  = $options;
            unset($data[array_keys($options)[0]]);
            $this->loopOptions($data ,0, $temp);
            $result[] =$temp;
        }
        return $result;
    }
    public function loopOptions($options, $pos = 0 ,&$result = array()){
        if($pos < count($options)){
            foreach($options[array_keys($options)[$pos]] as $optionGroupOne){
                array_push($result['name'],$optionGroupOne['Option']['name']);
                array_push($result['option'],$optionGroupOne['Option']['id']);
                $this->loopOptions($options ,$pos + 1, $result);
            }
        }
    }
    public function genTree($data, $base = ""){
        $result = "<ul>";
        foreach($data as $d){
            $result .= "<li>";
            $result .= "<span><i class=\"glyphicon glyphicon-star\"></i> ".$d['Category']['name']."</span> <a href=\"javascript:;\" data-id=\"".$d['Category']['id']."\"> Xem </a>";
            if(count($d['ChildCategory'])>0){
                $result .= $this->genTree($d['children'], $result);
            }
            $result .= "</li>";
        }
        $result.= "</ul>";
        return $result;
    }
}
