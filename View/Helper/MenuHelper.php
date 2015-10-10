<?php
/**
 * Created by PhpStorm.
 * User: LePhan
 * Date: 3/23/15
 * Time: 6:38 AM
 */
App::uses('Helper', 'View');

class MenuHelper extends Helper
{
    public function loopChildMenu($data, $parent_name, $prefix = '__')
    {
        foreach ($data as $child):
            ?>
            <tr>
                <td><?php echo $prefix . h($child['name']); ?>&nbsp;</td>
                <td><?php echo h($child['icon']); ?>&nbsp;</td>
                <td><?php echo h($child['url']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->_View->Html->link($parent_name, array('controller' => 'admin_menus', 'action' => 'view', $child['parent_id'])); ?>
                </td>
                <td><?php echo h($child['lft']); ?>&nbsp;</td>
                <td><?php echo h($child['rght']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->_View->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $child['id']), array('escape' => false)); ?>
                    <?php echo $this->_View->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $child['id']), array('escape' => false)); ?>
                    <?php echo $this->_View->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $child['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $child['id'])); ?>
                </td>
            </tr>
            <?php
        endforeach;
    }

    public function gennerateChildList_TH(
        $data,
        $fields,
        $field_names,
        $parent = 'Category',
        $child = 'children',
        $icon_class = 'ic_cm',
        $sub = false,
        $prefix = '&rarr;'
    )
    {
        $html = '<table cellpadding="0" cellspacing="0" class="table table-striped">';
        $html .= '<thead><tr>';
        foreach ($field_names as $name):
            $html .= '<td>';
            $html .= __($name);
            $html .= '</td>';
        endforeach;
        $html .= '<td class="actions"></td>';
        $html .= '</tr></thead>';
        $html .= '<tbody>';
        $html .= $this->gennerateChildList_TD($data, $fields, $parent, $child, $icon_class, $sub, $prefix);
        $html .= '</tbody>';
        $html .= '</table>';

        return $html;
    }

    public function gennerateChildList_TD($data, $fields, $parent, $child = 'children', $icon_class = 'ic_cm', $sub = false, $prefix = '__')
    {
        $html = '';
        foreach ($data as $d):
            $html .= '<tr>';
            foreach ($fields as $k => $field) {
                if ($field == 'name') {
                    $html .= '<td>' . $this->_View->Html->link(($sub ? $prefix : '') .
                            h($d[$parent][$field]),
                            array('action' => 'edit', $d[$parent]['id']), array('escape' => false))
                        . '</td>';
                } else {
                    $html .= '<td  class="' . ($field == 'icon' ? $icon_class : '') . '">' . h($d[$parent][$field]) . '</td>';
                }
            }
            $html .= '<td class="actions">';
            $html .= $this->_View->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $d[$parent]['id']), array('escape' => false));
            $html .= '&nbsp;';
            $html .= $this->_View->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $d[$parent]['id']), array('escape' => false));
            $html .= '&nbsp;';
            $html .= $this->_View->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $d[$parent]['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $d[$parent]['id']));
            $html .= '</td>';
            $html .= '</tr>';
            if (count($d[$child]) > 0) {
                $new_prefix = $prefix;
                if ($sub) $new_prefix .= $prefix;
                $html .= $this->gennerateChildList_TD($d[$child], $fields, $parent, $child, $icon_class, true, $new_prefix);
            }
        endforeach;
        return $html;
    }

    public function createMenu($menu)
    {
        foreach ($menu as $item):
            $submenu = false;
            if (count($item['ChildAdminMenu']) > 0) $submenu = true;
            if (!$submenu):
                ?>
                <li>
                    <a href="<?php echo $item['AdminMenu']['url']; ?>"
                       class="list-group-item <?php if ($item['AdminMenu']['url'] == $this->request->here) echo 'active'; ?>"><i
                            class="<?php echo $item['AdminMenu']['icon']; ?>"></i><?php echo $item['AdminMenu']['name']; ?>
                    </a>
                </li>
                <?php
            else:
                $active = '';
                $in = '';
                $html = '<li>
                    <a href="#sub' . $item['AdminMenu']['id'] . '" class="list-group-item {active}" data-toggle="collapse">
                        <i class="' . $item['AdminMenu']['icon'] . '"></i>' . $item['AdminMenu']['name'] . ' <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </li>';
                if ($item['AdminMenu']['url'] == $this->request->here) {
                    $in = 'in';
                    $active = 'active';
                }
                $html .= '<li class="collapse {flag}" id="sub' . $item['AdminMenu']['id'] . '">
                    <a href="' . Router::url($item['AdminMenu']['url']) . '" class="list-group-item ' . $active . '">
                    <i class="' . $item['AdminMenu']['icon'] . '"></i>' . $item['AdminMenu']['name'] . '</a>';

                foreach ($item['ChildAdminMenu'] as $child):
                    $subactive = '';
                    if ($child['url'] == $this->request->here) {
                        if ($active == '') $active = 'active';
                        $subactive = 'active';
                        $in = 'in';
                    }
                    $html .= '<a href="' . Router::url($child['url']) . '"
                       class="list-group-item ' . $subactive . '"><i
                            class="' . $child['icon'] . '"></i>' . $child['name'] . '</a>';
                endforeach;
                $html .= '</li>';
                $html = str_replace('{active}', $active, $html);
                $html = str_replace('{flag}', $in, $html);
                echo $html;
            endif;
        endforeach;
    }
}
