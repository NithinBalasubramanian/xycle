<?php
class Admin_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    public function table($table)
    {
        return $fields = $this->db->list_fields($table);
        $this->db->result_array();
    }
    public function create($tablename,$data)
    {
        $this->db->insert($tablename,$data);
        return $this->db->insert_id();
    }
    public function table_column($tablename,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->where($column2,$val2);
        }
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_desc($tablename,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->where($column2,$val2);
        }
        $this->db->order_by('id','DESC');
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_or($tablename,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->or_where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->or_where($column2,$val2);
        }
        $this->db->order_by('id','DESC');
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_or_chat($tablename,$column=FALSE,$val=FALSE,$column1=FALSE,$val1=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->where($column,$val);
        }
        if($column1 != FALSE)
        {
            $this->db->or_where($column1,$val1);
        }
        $this->db->order_by('id','ASC');
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_like($tablename,$column=FALSE,$val=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column != FALSE)
        {
            $this->db->like($column,$val);
        }
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_limit($tablename,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->where($column2,$val2);
        }
        $this->db->limit($val);
        $result=$this->db->get();
        return $result->result_array();
    }
    public function table_column_limit_desc($tablename,$val=FALSE,$column1=FALSE,$val1=FALSE,$column2=FALSE,$val2=FALSE)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        if($column1 != FALSE)
        {
            $this->db->where($column1,$val1);
        }
        if($column2 != FALSE)
        {
            $this->db->where($column2,$val2);
        }
        $this->db->order_by('id','DESC');
        $this->db->limit($val);
        $result=$this->db->get();
        return $result->result_array();
    }
    public function edit($tablename,$data,$where)
    {
        return $this->db->update($tablename,$data,$where);
    }
    public function delete($tablename,$delete_id)
    {
        $this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('id',$delete_id);
       return $query = $this->db->delete($tablename);
    }
    public function delete_where($tablename,$where)
    {
        $this->db->delete($tablename,$where);
    }
    public function multiple_images($image = array()){

        return $this->db->insert_batch('profile_images',$image);
                }
}