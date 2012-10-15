<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*----------------------------------------------------
 | ORM封装了基本的添加，删除，更新，查询，是否存在等基本需求，当然没DataMapper等ORM强大，但是适合当前的业务需求
 | CI2.0中对model的拓展必须放在core下，而对form_validation的拓展则要放在libraries下^_^
 | @author robot(黑暗人魔)
 | @date 2011/07/03
 | @use 在ci的model中继承MY_Model即可
 ----------------------------------------------------*/
class MY_Model extends CI_Model
{
    var $table = ''; // 表名
    var $last_query_number = 0; // 上次查询的结果总数
    var $validation = array(); // 验证
    var $errors = array(); // 出错信息

    public function __construct() {
        parent::__construct();
    }

    public function find_by($attribute, $value) {
        return $this->db->where($attribute, $value)->get($this->table)->result();
    }

    public function create($entity) {
        if ($this->db->field_exists('created_at', $this->table)) {
            $entity['created_at'] = date('Y-m-d H:i:s');
        }
        if ($this->db->field_exists('updated_at', $this->table)) {
            $entity['updated_at'] = date('Y-m-d H:i:s');
        }
        return $this->validation($entity, 'add') === TRUE ? $this->db->insert($this->table, $entity) : FALSE;
    }

    public function update($entity, $where=array(), $validation = true) {
        if (empty($where)) {
            $where = array('id' => $entity['id']);
        }
        // 未变化的数据不更新
        $data = current($this->get($where));
        if (empty($data)) {
            $this->errors['update'] = '要更新的数据不存在';
            return false;
        }
        foreach ($entity as $key => $value) {
            if ($data->{$key} == $value) {
                unset($entity[$key]);
            }
        }
        if (empty($entity)) {
            return true;
        }

        if ($this->db->field_exists('updated_at', $this->table)) {
            $entity['updated_at'] = date('Y-m-d H:i:s');
        }

        if ($validation) {
            return $this->validation($entity, 'update') === TRUE ? $this->db->where($where)->update($this->table, $entity) : FALSE;
        } else {
            return $this->db->where($where)->update($this->table, $entity);
        }
    }

    public function get($where = array(), $page = 1, $offset = 20)
    {
        if (!is_numeric($page)) {
            $page = 1;
        }
        if (!empty($where)) {
            $this->db->where($where);
        }

        $db_count = clone $this->db;
        $this->last_query_number = $db_count->count_all_results($this->table);

        $this->db->limit($offset, ($page - 1) * $offset);
        $this->db->order_by('id', 'desc');//默认按id降序排

        return $this->db->get($this->table)->result();
    }

    public function delete($id)
    {
        return $this->db->where(array('id' => $id))->delete($this->table);
    }

    /**
     * 验证数据有效性，集成codeigniter原生的form验证
     * @param $data 待验证的数据
     * @param $type update:表示只验证待更新的数据
     * 				add或其他:表示全验证
     * @return 验证成功则返回TRUE
     * 		   验证失败返回出错的信息
     */
    public function validation($data, $type = 'update')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $rules = array();
        foreach ($this->validation as $item) {
            if ($type == 'update') {
                // 为了兼容spot[name]这种情况
                if (in_array(str_replace(']', '', substr($item['field'], strpos($item['field'], '[')+1)), array_keys((array)$data))) {
                    $rules[] = $item;
                }
            } else {
                $rules[] = $item;
            }
        }

        if (empty($rules)) { // 验证规则为空则说明必然通过验证
            return TRUE;
        }

        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === FALSE) {
            foreach($this->validation as $item) { // 将验证的错误绑定上去
                $error = form_error($item['field']);
                if (!empty($error)) {
                    $this->errors[$item['field']] = $error;
                }
            }
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // set($tickets, 'User_model', 'user_id')
    public function set($entities, $model_name, $fk) {
        $ids = array();
        foreach ($entities as $entity) {
            $ids[] = $entity->{$fk};
        }
        $ids = array_unique($ids);
        $this->load->model($model_name);
        $objects = $this->{$model_name}->db->where_in('id', $ids)->get($this->{$model_name}->table)->result();
        foreach ($entities as $entity) {
            foreach ($objects as $object) {
                if ($entity->{$fk} == $object->id) {
                    $entity->{str_replace('_id', '', $fk)} = $object;
                    break;
                }
            }
        }
        return $entities;
    }
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */