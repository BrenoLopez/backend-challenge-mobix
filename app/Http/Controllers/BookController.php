<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Exception;


class BookController extends Controller
{
    // get covers book by isbn
    public function showCoverByIsbn(Request $request)
    {

        try{    
             $isbn = $request->query('isbn');

             $array = explode(",",$isbn);
             
             
            $array_cover= array();

            foreach ($array as $isbn) {
               
              $cover= Http::get("http://covers.openlibrary.org/b/isbn/$isbn-S.jpg");
              $cover_base64= base64_encode($cover);
                    $array_cover[]=  [
                                'isbn'=>$isbn,
                                'url'=> "http://covers.openlibrary.org/b/isbn/$isbn-S.jpg",
                                'image_base_64'=>$cover_base64,
                                ];
            }
           
            return $array_cover;

        }catch(Exception $error){
            echo $error->getMessage();
        }        
        
    }

    public function showBookByCharacter(Request $request)
    {

        try{    
            
            $character_id = $request->character_id;

            $character = HTTP::get("https://anapioficeandfire.com/api/characters/$character_id");

            
            $books=  $character['books'];
            $povBooks= $character['povBooks'];

            $array_books=  array();

            foreach ($books as $book) {
                $array_books[]=  $book;
            }

            foreach ($povBooks as $povBook) {
                array_push($array_books,$povBook);
            }

            $array_books= ['books'=>$array_books,'character_id'=>$character_id,'url'=>"https://anapioficeandfire.com/api/characters/$character_id"];
            return  $array_books;
         
        }catch(Exception $error){
            echo $error->getMessage();
        }        
        
    }


}
