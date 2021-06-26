<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function getphone(Request $request)
    {
        if ($request->ajax())
        {
            $query = $request->get('query');    
            $datas = file_get_contents(public_path('json/mobiles.json'));
            $json = json_decode($datas);
            $array = array();
            $nomor = 0;
            $bren = '';
            foreach($json as $key=>$value)
            {
                if($query == $value->brand)
                {
                    #if($bren == $value->brand){
                        #continue;
                    #}else{
                        $array[$nomor]['brand'] = $value->brand;
                        $array[$nomor]['name'] = $value->name;
                        $nomor++;
                    #}
                    #$bren = $value->brand;
                }else{
                    continue;
                }
            }
            return $array;
        }
    }
}
