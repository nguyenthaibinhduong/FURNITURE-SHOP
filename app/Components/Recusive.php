<?php
namespace App\Components;
class Recusive{
    private $data;
    private $option = '';
    
    public function __construct($data)
    {
        $this->data=$data;
    }
    public function Recusive($id=0,$text='')
    {
        foreach($this->data as &$value)
        {
            if($value['parent_id']==$id){
               $value['name']=$text.$value['name'];
                $this->Recusive($value['id'],$text.'--');
            }
        }
        return $this->data;
    }
    public function categoryRecusive($parent_id,$id=0,$text='')
    {
        foreach($this->data as $value)
        {
            if($value['parent_id']==$id){
                if(!empty($parent_id) && $parent_id==$value['id']){
                    $this->option.='<option selected value="'.$value['id'].'">'.$text.$value['name'].'</option>';
                }else{
                    $this->option.='<option value="'.$value['id'].'">'.$text.$value['name'].'</option>';
                }
                $this->categoryRecusive($parent_id,$value['id'],$text.'--');
            }
        }
        return $this->option;
    }
    public function menuRecusive($parent_id,$id=0,$text='')
    {
        foreach($this->data as $value)
        {
            if($value['parent_id']==$id){
                if(!empty($parent_id) && $parent_id==$value['id']){
                    $this->option.='<option selected value="'.$value['id'].'">'.$text.$value['name'].'</option>';
                }else{
                    $this->option.='<option value="'.$value['id'].'">'.$text.$value['name'].'</option>';
                }
                $this->categoryRecusive($parent_id,$value['id'],$text.'--');
            }
        }
        return $this->option;
    }
}