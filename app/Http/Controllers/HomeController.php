<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;


class HomeController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $records = News::inRandomOrder()->paginate(3);
        $rec = News::where('category_id','=',2)->orderBy('created_at', 'desc')->paginate(3);
                                                    
      
        return view('home.index',[
            'records'=>$records,
            'categories'=>$this->getCategories()
        ],
            compact('rec')
        );
    }
   
    
    public function show(){
       
        $alias = request()->path();
         // dd($alias);
        $record = News::where('alias',$alias)->first();

        $comments = $record->comments()->get();


  



        return view('home.show',[
            'record'=>$record,
            'comments' => $comments,
            'categories'=>$this->getCategories($record->category_id)
        ]);
    }

    // страница категории
    public function category(){
        // dd(request()->path());
        $alias = request()->path();
        $record = Category::where('alias',$alias)->first();
        if(empty($record)){
            abort(404);
        }


        return view('home.category',[
            'record'=>$record,
            'news'=> $record->news()->paginate(5), // получение связанных новостей
            'categories'=>$this->getCategories($record->id)
        ]);
    }
    public function image_preview($path){
        $path = public_path('images').'/'.$path;
        $img = \Image::make($path)->fit(600, 360);

        return $img->response('jpg');
    }
    public function image_detail($path){
        $path = public_path('images').'/'.$path;
        $img = \Image::make($path)->fit(1200, 500);

        return $img->response('jpg');
    }
    protected function getCategories($active_id = null){
        $categories = Category::whereNull('category_id')->get();
        return $categories->map(function($record) use($active_id){
            if($record->id == $active_id){
                $record->active = true;
            }else{
                $record->active = false;
            }
            return $record;
        });
    }


}
