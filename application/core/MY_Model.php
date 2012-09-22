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
    var $table = ''; //表名
    var $last_query_number = 0; // 上次查询的结果总数
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
        return $this->db->insert($this->table, $entity);
    }

    public function update($entity) {
        if ($this->db->field_exists('updated_at', $this->table)) {
            $entity['updated_at'] = date('Y-m-d H:i:s');
        }
        return $this->db->where('id', $entity['id'])->update($this->table, $entity);
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
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */