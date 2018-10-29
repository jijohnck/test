<?php
class modl1 extends CI_Model {

        

        public function login($data)
        {
                $this->db->select('*');
                $this->db->from('login');
                $this->db->where($data);
                $query = $this->db->get();
                return $query;
        }
        public function shop_mall()
        {
                $this->db->select('*');
                $this->db->from('mall');
                $query1 = $this->db->get();
                foreach($query1->result() as $rows2)
                   {
                       $mall[] = $rows2;
                   }

                $this->db->select('shop.id,shop.sname, mall.name');
                $this->db->from('shop');
                $this->db->join('mall', 'shop.maill_id = mall.id');
                $query2 = $this->db->get();
                foreach($query2->result() as $rows3)
                   {
                       $shop[] = $rows3;
                   }
                $data1 = array('shop' => $shop , 'mall' => $mall);
                
                return $data1;
        }
        public function mal_del($id){

                $this->db->where('id', $id);
                $this->db->delete('mall');

        }
        public function shop_del($id){
                $this->db->where('id', $id);
                $this->db->delete('shop');
        }
        public function mall_ad($mall_name){
                $data = array(
                        'name' => $mall_name
                );
                $this->db->insert('mall', $data);
        }
        public function shop_ad($data){
                $this->db->insert('shop', $data);
        }


}
?>