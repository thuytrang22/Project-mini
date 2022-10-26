<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Request;


class UserController extends Controller
{
   public function index(Request $request){
            $search = $request->search;
           $users = User::where('full_name',  'like', '%' . $search . '%' )->orderBy('id', 'desc')->paginate(20);
           return view('users.index', compact('users'));
   }

   public function search(){
       return view('search');
}
    function getSearchAjax(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('products')
                ->where('name_product', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
               <li><a href="data/'. $row->id .'">'.$row->name_product.'</a></li>
               ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
