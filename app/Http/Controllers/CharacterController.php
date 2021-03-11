<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Exception;

class CharacterController extends Controller
{
    //informação completa dos principais personagens 
    public function index(Request $request)
    {

        try{
           
            $book_id = $request->book_id;

            $response = Http::get("https://anapioficeandfire.com/api/books/$book_id");

            // return $response;

            $data=  $response['povCharacters'];
            $array=  array();

            foreach ($data as $url) {
               
                $res = Http::get($url);
                $array[]=  json_decode($res);
            }
         
            return  $array;
               
        }catch(Exception $error){
            echo $error->getMessage();
        }        
        
    }

    // detalhe de um ou mais personagens
    public function ShowDetails(Request $request)
    {

        try{
           
            $characters = $request->query('characters');
            $detail =$request->query('detail');

            $array_characters_id = explode(",",$characters);

            $array_characters= array();
            

            foreach ($array_characters_id as $charact) {
               
                $character = HTTP::get("https://anapioficeandfire.com/api/characters/$charact");
               
                if($character){
                    $data= $character[$detail];

                    $array_characters[]=
                            [
                                $detail=>$data,
                                'character_id'=>$charact
                            ];
                }
                
            }

           return  $array_characters;
               
        }catch(Exception $error){
            echo $error->getMessage();
        }        
        
    }

}
