<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket_model extends MY_Model
{
    var $table = 'tickets';
    var $validation = array(
        array('field' => 'ticket[spot_id]', 'label' => '景区', 'rules' => 'trim|required|numeric|exist[spots.id]'),
        //array('field' => 'ticket[user_id]', 'label' => '用户', 'rules' => 'trim|required|numeric'),
        array('field' => 'ticket[handbook_unique_id]', 'label' => '手册id', 'rules' => 'trim|required|exist[handbooks.unique_id]')
    );

    public function create($entity, $mobile='') {
        $this->load->model('User_model', 'user');
        $user = current($this->user->get(array('is_validation' => 'Y', 'mobile' => $mobile)));
        if (empty($user)) { // 验证用户是否存在
            $this->errors['user_id'] = '用户不存在或未激活.';
            $this->validation($entity, 'add');
            return false;
        } else {
            $entity['user_id'] = $user->id;
        }
        // 验证手册id是否是该用户激活的
        $this->load->model('Handbook_model', 'handbook');
        $handbook = current($this->handbook->get(array('is_used' => 'Y', 'user_id' => $entity['user_id'], 'unique_id' => $entity['handbook_unique_id'])));
        if (empty($handbook)) {
            $this->errors['handbook_unique_id'] = '手册id不存在.';
            return false;
        }
        // 验证张数是否超过限制，目前统一是3张
        $tickets = $this->get(array('user_id' => $entity['user_id'], 'spot_id' => $entity['spot_id'], 'handbook_unique_id' => $entity['handbook_unique_id']));
        if (count($tickets) > 2) {
            $this->errors['handbook_unique_id'] = '该用户购买票的次数超过了3次.';
            return false;
        }
        return parent::create($entity);
    }

    public function set_spots($tickets) {
        $ids = array();
        foreach ($tickets as $ticket) {
            $ids[] = $ticket->spot_id;
        }
        $ids = array_unique($ids);
        $this->load->model('Spot_model', 'spot');
        $spots = $this->spot->db->where_in('id', join(',', $ids))->get($this->spot->table)->result();
        foreach ($tickets as $ticket) {
            foreach ($spots as $spot) {
                if ($ticket->spot_id == $spot->id) {
                    $ticket->spot = $spot;
                    break;
                }
            }
        }
        return $tickets;
    }

    // 统计给定景点的一定时间内售出票数量
    public function count_for_spots($spots, $time_start=null, $time_end=null) {
        if (empty($time_start)) { // 默认是一周内的数据
            $time_start = date('Y-m-d 00:00:00', mktime(0,0,0,date("m"),date("d")-7,date("Y")));
        }
        if (empty($time_end)) {
            $time_end = date('Y-m-d 23:59:59');
        }
        $spot_ids = array();
        foreach ($spots as $spot) {
            $spot_ids[] = $spot->id;
        }
        $sql = "SELECT COUNT(*) AS count, spot_id FROM tickets WHERE spot_id IN(?) AND created_at > ? AND created_at < ?";
        $counts = $this->db->query($sql, array(join(',', $spot_ids), $time_start, $time_end))->result();
        foreach ($spots as $spot) {
            foreach ($counts as $item) {
                if ($item->spot_id == $spot->id) {
                    $spot->ticket_counts = $item->count;
                    break;
                }
            }
        }

        return $spots;
    }
}

/* End of file ticket_model.php */
/* Location: ./application/models/ticket_model.php */