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

        foreach($this->data as $value)
        {
            
            if($value['parent_id']==$id){
                $this->option.='<tr>
                <td>'.$text.$value['name'].'</td>
                <td><a class="text-danger" href="'. route('category.delete',['id'=>$value['id']]) .'">Xóa</a> | <a  href="'.route('category.edit',['id'=>$value['id']]).'">Sửa</a></td></tr>';
                $this->Recusive($value['id'],$text.'--');
            }
        }
        return $this->option;
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
                $this->menuRecusive($parent_id,$value['id'],$text.'--');
            }
        }
        return $this->option;
    }
}