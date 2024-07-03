<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\UserRepositoryInterface;

class AjaxCrudControlle extends Controller
{



      public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {



    }


    public function index(){
    $data= $this->userRepository->get_all();


        return view('product.index',['data'=>$data]);
    }


     public function store(Request $request){
     $data = $request->validate([
    'name' => 'required',
    'qty' => 'required|numeric',
    'price' => 'required|decimal:0,2', // assuming you want 2 decimal places
    'description' => 'nullable',
]);


$save= $this->userRepository->store($data);
return redirect(route('product.index'));

     }



    public function edit(Request $request){

       $id=$request->input('id');
$products= $this->userRepository->edit($id);


$content='<form  id="update_data">


    <label for="name">Name:</label>
    <input type="text" name="name"  placeholder="Name" required value="'.$products->name.'">

     <label for="name">qty:</label>
    <input type="text" name="qty" placeholder="Qty" required value="'.$products->qty.'">


     <label for="name">price:</label>
    <input type="text" name="price" placeholder="Price" required value="'.$products->price.'">

     <label for="name">description:</label>
    <input type="text" name="description" placeholder="Description" value="'.$products->description.'">


    <button type="button" onclick="update('.$products->id.')" class="btn btn-warning">Add</button>
</form>';
echo $content;
        // return view('product.index',['products'=>$products]);



}

  public function update(Request $request){
    $dataa=$request->input('data');
    $id=$request->input('id');

      $data = \Validator::make($dataa, [
        'name' => 'required',
        'qty' => 'required|numeric',
        'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'description' => 'nullable',
    ])->validate();

$save= $this->userRepository->update($data,$id);
$data= $this->userRepository->get_all();


 


echo $data;





     }
  public function delete_(Request $request){
    $id=$request->input('id');

$save= $this->userRepository->delete($id);
$data= $this->userRepository->get_all();
echo $data;


}
  public function get_data(Request $request){
$data= $this->userRepository->get_all();
echo $data;


  }
     
}
