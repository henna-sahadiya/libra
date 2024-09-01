<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lang_model;
use App\Models\auth_model;
use App\Models\bookty_model;
use App\Models\pub_model;
use App\Models\login_model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class cntrool extends Controller
{
    //
    function langg()
        {        
            $record=lang_model::orderby('name','asc')->get();    
            return view('language',['lang'=>$record]); 
        }
    function lang(request $req)
        {
            $req->validate(['ln'=>'required|unique:lang_tb,name',
                            'lc'=>'required|unique:lang_tb,code']);
            $insert=new lang_model;
            $insert->name=$req->ln;
            $insert->code=$req->lc;
            $insert->save();
            return redirect("language")->with('msg','Add Successfully');
        }
    function deletela($lan)
        {
            $lala=lang_model::find($lan);
            $lala->delete();
            return redirect('language')->with('msg','Delete Successfully');
        }
    function lan_url($edi)
        {        
            $lala=lang_model::find($edi);
            return Response()->json($lala);
        }
    function lanurl($lan1,$lan2,$lan3,$lan4)
        {        
            if(lang_model::where("name",$lan1)->where("id","!=",$lan4)->exists())
            {
                return Response()->json(['msg'=>'Name already exist']);
            }
            else
            {
                $insert=lang_model::find($lan4);
                $insert->name=$lan1;
                $insert->code=$lan2;
                $insert->status=$lan3;
                $insert->save();
                return Response()->json(['msg'=>'Successfully inserted']);
            }          
        }

//AUTHOR
    function authh()
        {
            $record=auth_model::orderby('name','asc')->get();   
            return view('author',['auth'=>$record]);
        }
    function auth(request $req)
        {
            $req->validate(['an'=>'required|unique:auth_tb,name',
                            'mn'=>'required|unique:auth_tb,mob',
                             'img'=>'nullable|mimes:jpeg,png,jpg,JPG,gif|max:2048',]);
            $insert=new auth_model;
            $insert->name=$req->an;
            $insert->mob=$req->mn;
            $imgage='';
            if($req->hasfile('img'))
                {
                    $imgage=date('YmdHis').'.'.$req->img->getClientOriginalExtension();
                    $req->img->storeAs('authorimg',$imgage,'public');
                    $insert->img=$imgage;
                }
            else 
                {
                    $insert->img = null; // Or a default image if none is provided
                }
            $insert->save();
            return redirect("author")->with('msg','Add Successfully');
        }
    function deleteau($lan)
        {
            $lala=auth_model::find($lan);
            $lala->delete();
            return redirect('author')->with('msg','Delete Successfully');
        }
        
//BOOKTYPE
    function bookttype()
        {
            $record=bookty_model::orderby('booktype','asc')->get(); 
            return view('booktype',['boty'=>$record]);
        }
    function boty(request $req)
        {
            $req->validate(['bt'=>'required|unique:bookty_tb,booktype']);
            $insert=new bookty_model;
            $insert->booktype=$req->bt;
            $insert->save();
            return redirect("booktype")->with('msg','Add Successfully');
        }
    function deletebt($lan)
        {
            $lala=bookty_model::find($lan);
            $lala->delete();
            return redirect('booktype')->with('msg','Delete Successfully');
        }
    function bt_url($edi)
        {        
            $lala=bookty_model::find($edi);
            return Response()->json($lala);
        }
    function bturl($btt1,$btt2,$btt3)
        {        
            if(bookty_model::where("name",$btt1)->where("id","!=",$btt3)->exists())
            {
                return Response()->json(['msg'=>'Name already exist']);
            }
            else
            {
                $insert=bookty_model::find($btt3);
                $insert->name=$btt1;
                $insert->status=$btt2;
                $insert->save();
                return Response()->json(['msg'=>'Successfully inserted']);
            }          
        }

//PUBLISHER
    function publi()
        {
            $record=pub_model::orderby('name','asc')->get(); 
            return view('publisher',['publi'=>$record]);
        }
    function pub(request $req)
        {
            $req->validate(['pn'=>'required|unique:pub_tb,name',
                            'mob'=>'required|unique:pub_tb,mob']);
            $insert=new pub_model;
            $insert->name=$req->pn;
            $insert->mob=$req->mob;
            $insert->save();
            return redirect("publisher")->with('msg','Add Successfully');
        }
    function deletepu($lan)
        {
            $lala=pub_model::find($lan);
            $lala->delete();
            return redirect('publisher')->with('msg','Delete Successfully');
        }
//LOGIN
//new password=098
    function loginn()
        {
            /*$a=Crypt::encrypt('1234567');
            die($a);*/
            return view('login');
        }

    function log(request $req)
        {
            
            $email = $req->email;
            $Password = $req->Password;
            if(login_model::where("username",$email)->exists())
            {
                $edit=login_model::where("username",$email)->first();
                if($Password === Crypt::decrypt($edit->password))
                    {                      
                        Session::put('id',$edit->id);
                        Session::put('username',$edit->name);
                        return redirect('language');
                     }
                else
                    {
                        return redirect('login')->with('msg','Wrong Password');
                    }
            }
            else
            {
                return redirect('login')->with('msg','Wrong username');
            }
        }

//LOGOUT
    function logout()
        {
            session::flush();
            return redirect('login');
        }

//PASSWORD
    function password()
        {
            return view('password');
        }

    function pasword(request $req)
        {
            $req->validate(['currentpassword'=>'required',
                            'newpassword'=>'required',
                            'conformpassword'=>'required|same:newpassword']);
            $curtpass=$req->currentpassword;
            $newpass=$req->newpassword;
            $confpass=$req->conformpassword;
            $password=login_model::select("password")->where("id",Session::get("id"))->first();

            if(Crypt::decrypt($password->password)==$curtpass)
                {
                    $passvariable=login_model::find(session::get("id"));  
                    $passvariable->password=Crypt::encrypt($newpass);
                    $passvariable->save();
                    return redirect('login'); 
                }
            else
                {
                    return redirect('password')->with('msg','Incorrect password');
                }
        } 

// new url method
        
   // function urll(Request $req)
        //{ 
            // $record=DB::table('cities')->select('countries.name')->join('countries','cities.country_code','=','countries.code')->where('cities.name',$req->cities);
           // $exists=$record->exists();
           // if($exists)
               // {
                 //   $record=$record->first();
                 //   return Response()->json(['message'=>$req->cities.' is located in '.$record->name]);
             //   }
          //  else
              //  {
              //      return Response()->json(['message'=>'no city']);
              //  }
            
     //   }

}
