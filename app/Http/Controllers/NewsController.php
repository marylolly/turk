<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\News;
use App\Category;



// use Input;
class NewsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // делает доступными только авторизованным пользователям - админстратору
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_id = request('category_id');
        // $categories = Category::all();
        if($category_id == null){
            $records = News::orderBy('updated_at', 'desc')->paginate();
        }else{
            $records = News::where('category_id',$category_id)->orderBy('updated_at', 'desc')->paginate();
        }
 
        // dd($records);
        // точка разделитель каталогов в папке views
        return view('news.index',['records'=>$records,'categories'=>$this->getCategories($category_id), 'category_id'=>$category_id]);
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('news.form',[
            'title'=>'Добавить новость',
            'record'=>null,
            'categories'=>Category::all(),
            'form_action'=>route('news.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(['create',$request->all()]);
        $record = new News();
        $record->title = $request->input('title');
        $category_id = $request->input('category_id');
        if($category_id == 0) $category_id = null;
        $record->category_id = $category_id;
        $record->description = $request->input('description');
        $record->content = $request->input('content');
        $record->save();

        $image =Input::file('image');
        // dd( get_class_methods($image));

        if(!empty( $image)){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$image_name);
            $record->image = '/images/'.$image_name;
            $record->save();
        }

        return redirect(route('news.index'))->with('success','Новость добавслена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = News::findOrFail($id);
        return view('news.form',[
            'title'=>'Редактировать новость - "'.$record->title.'"',
            'record'=>$record,
            'categories'=>Category::all(),
            'form_action'=>route('news.update',['news'=>$record->id])
        ]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = News::findOrFail($id);
        $record->title = $request->input('title');
        $category_id = $request->input('category_id');
        if($category_id == 0) $category_id = null;
        $record->category_id = $category_id;
        $record->description = $request->input('description');
        $record->content = $request->input('content');
        $record->save();
        $image =Input::file('image');
        // dd( get_class_methods($image));

        if(!empty( $image)){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$image_name);
            $record->image = '/images/'.$image_name;
            $record->save();
        }
        return redirect(route('news.index'))->with('success','Новость "'.$record->id.'" изменена!');
        // dd(['update',$request->all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return redirect(route('news.index'))->with('success','Новость удалена!');
    }
}
