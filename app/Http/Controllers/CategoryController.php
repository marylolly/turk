<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $records = Category::orderBy('updated_at', 'desc')->paginate();

     
        // dd($records);
        // точка разделитель каталогов в папке views
        return view('categories.index',['records'=>$records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.form',[
            'title'=>'Добавить категорию',
            'categories'=>$this->getRootCategories(),
            'record'=>null,
            'form_action'=>route('categories.store')
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
        $record = new Category();
        $record->name = $request->input('name');
        $category_id = $request->input('category_id');
        if($category_id == 0) $category_id = null;
        $record->category_id = $category_id;
        $record->save();
        return redirect(route('categories.index'))->with('success','Категория добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
     // $record = News::findOrFail($id);
        return view('categories.form',[
            'title'=>'Редактировать категорию - "'.$category->name.'"',
            'record'=>$category,
            'categories'=>$this->getRootCategories(),
            'form_action'=>route('categories.update',['category'=>$category->id])
        ]);
    }
    protected function getRootCategories(){
        return Category::whereNull('category_id')->get();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      
        $category->name = $request->input('name');
        $category_id = $request->input('category_id');
        if($category_id == 0) $category_id = null;
        $category->category_id = $category_id;
        $category->save();
        return redirect(route('categories.index'))->with('success','Категория "'.$category->id.'" изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('categories.index'))->with('success','Категория удалена!');
    }
}
