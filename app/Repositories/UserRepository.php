<?php

namespace App\Repositories;

use App\Models\Ajax_create;


class UserRepository implements UserRepositoryInterface
{


    
      public function get_all()
    {
   $content='';
       $data= Ajax_create::all();
           foreach ($data as $product) {
        $content .='
              <tr>
      <th scope="row">'.$product->id.'</th>
      <td>'.$product->name.'</td>
      <td>'.$product->qty.'</td>
      <td>'.$product->price.'</td>

      <td>'.$product->description.'</td>
      <td><button  type="button"  onclick="edit('.$product->id.');"  class="btn btn-primary">  Edit</button ></td>
      <td><button   type="button"  onclick="delete_('.$product->id.');"  class="btn btn-danger">  Delete</button ></td>


    </tr>';
    
  }


     return $content;
    }
    public function store(array $data)
    {
        return Ajax_create::create($data);
     



    }
    public function edit($id)
    {
       return Ajax_create::where('id',$id)->first();
    }
     public function update(array $data,$id)
    {

       
        return Ajax_create::where('id',$id)->update($data);
     
    }
        public function delete($id)
    {

       
        return Ajax_create::where('id',$id)->delete();
     
    }
    

}