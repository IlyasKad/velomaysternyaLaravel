<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PageController extends Controller {
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order = null) { // get 1
        $categories = Page::getCategories();
        return view("createPage", ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $order = null) { //post 1
        $validator = $request->validate([
            'image_content' => 'required|image|mimetypes:image/jpeg,image/png',
            'image_intro' => 'required|image|mimetypes:image/jpeg,image/png',
            'code' => 'required|unique:pages|alpha_dash|string|min:1|max:100',
            'caption_ua' => 'required|string|min:3|max:100',
            'caption_en' => 'required|string|min:3|max:100',
            'content_ua' => 'required|string|min:20|max:2000',
            'content_en' => 'required|string|min:20|max:2000',
            'intro_ua' => 'required|string|min:20|max:750',
            'intro_en' => 'required|string|min:20|max:750',
            'price' => 'required|integer|min:0',
        ]);

    
        $page = new Page();
        $page->code = $request->input('code');
        $page->price = $request->input('price');
        $page->caption_ua = $request->input('caption_ua');
        $page->caption_en = $request->input('caption_en');
        $page->content_ua = $request->input('content_ua');
        $page->content_en = $request->input('content_en');
        $page->intro_ua = $request->input('intro_ua');
        $page->intro_en = $request->input('intro_en');
        $page->parent_id = $request->input('parent');
        $extensionIntro = $request->file('image_intro')->getClientOriginalExtension();// получаем расширение загружаемого 
        $extensionContent = $request->file('image_content')->getClientOriginalExtension();// получаем расширение загружаемого 

        $page->image_content = $page->code."_content.".$extensionContent;  // создаем имя файла  и записываем в бд
        $page->image_intro = $page->code."_intro.".$extensionIntro;  // создаем имя файла  и записываем в бд
        
        $path = $request->image_content->storeAs('images', $page->image_content, 'public'); // сохранение файла
        $path = $request->image_intro->storeAs('images', $page->image_intro, 'public'); // сохранение файла
      
        $page->save();

        return redirect()->route('pages.show', $page->code); 
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function show($code, $order = null) {
        $page = Page::where('code', $code)->first();
        return $page->render(true, $order);
    }

    public function userShow($code, $order = null) {
        if ($code == "root") {
            return abort(404);
        }
        $page = Page::where('code', $code)->first();
        return $page->render(false, $order);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($order = null) {  
        return $this->show('root');
    }

    public function userIndex($order = null) {  
        $page = Page::where('code', 'root')->first();
        return $page->render(false, $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function edit($code, $order = null) { // get 2
        $page = Page::where('code', $code)->first();
        return view('editPage', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $code, $order = null) { // put 2
        $page = Page::where('code', $code)->first();
        $validator = $request->validate([
            'image_content' => 'image|mimetypes:image/jpeg,image/png',
            'image_intro' => 'image|mimetypes:image/jpeg,image/png',
            'caption_ua' => 'required|string|min:3|max:100',
            'caption_en' => 'required|string|min:3|max:100',
            'content_ua' => 'required|string|min:20|max:2000',
            'content_en' => 'required|string|min:20|max:2000',
            'intro_ua' => 'required|string|min:20|max:750',
            'intro_en' => 'required|string|min:20|max:750',
            'price' => 'required|integer|min:0',
            'code' => [
                'required','alpha_dash','string','min:1','max:100',
                Rule::unique('pages')->ignore($page->code, 'code'),
            ],
        ]);

        $page->price = $request->input('price');
        $page->caption_ua = $request->input('caption_ua');
        $page->caption_en = $request->input('caption_en');
        $page->content_ua = $request->input('content_ua');
        $page->content_en = $request->input('content_en');
        $page->intro_ua = $request->input('intro_ua');
        $page->intro_en = $request->input('intro_en');
        $page->parent_id = $request->input('parent');

        // IMAGES
        
        if ($request->file('image_intro') && $request->file('image_intro')->isValid()) { // проверка что хотим изменить картинку
            Storage::disk('public')->delete('images/' . $page->image_intro); // удаляем из сторадже старый файл
            $extensionIntro = $request->file('image_intro')->getClientOriginalExtension(); // получаем расширение загружаемого файла
            $page->image_intro = $request->input('code') . "_intro." . $extensionIntro;  // создаем имя файла  и записываем в бд
            $path = $request->image_intro->storeAs('images', $page->image_intro, 'public'); // сохранение файла
        } else if($page->code != $request->input('code')) { // хотим оставить старую картинку
            $old_extension_intro = pathinfo($page->image_intro, PATHINFO_EXTENSION);  // получаем расширение старого файла
            $new_image_intro =  $request->input('code') . "_intro." . $old_extension_intro; // создаем новое имя файла
            Storage::disk('public')->move('images/' . $page->image_intro, 'images/' . $new_image_intro); // переименовываем файл
            $page->image_intro = $new_image_intro; // изменяем имя картинки в бд
        }

        if ($request->file('image_content') && $request->file('image_content')->isValid()) {
            Storage::disk('public')->delete('images/' . $page->image_content);
            $extensionContent = $request->file('image_content')->getClientOriginalExtension();
            $page->image_content = $request->input('code') . "_content." . $extensionContent;
            $path = $request->image_content->storeAs('images', $page->image_content , 'public');
        } else if($page->code != $request->input('code')) { 
            $old_extension_content = pathinfo($page->image_content, PATHINFO_EXTENSION); 
            $new_image_content = $request->input('code') . "_content." . $old_extension_content;
            Storage::disk('public')->move('images/' . $page->image_content, 'images/' . $new_image_content);
            $page->image_content = $new_image_content;
        }

        $page->code = $request->input('code');        
        $page->save();
        return redirect()->route('pages.show', $page->code);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $code
     * @return \Illuminate\Http\Response
     */
    public function destroy($code, $order = null) {
        $page = Page::where('code', $code)->first();
        Storage::disk('public')->delete('images/' . $page->image_content);
        Storage::disk('public')->delete('images/' . $page->image_intro);
        $page->delete();        
        return redirect()->route('pages.index');
    }
}
