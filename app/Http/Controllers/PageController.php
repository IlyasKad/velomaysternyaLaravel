<?php

namespace App\Http\Controllers;

use App\Page;
use App\Entity;
use App\Fieldvalue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PageController extends Controller {

    public function create($entity_id=1) { // get 1
        $categories = Page::getCategories();
        $entities = Entity::All();
        $currentEntity = Entity::find($entity_id);

        return view("createPage", [
            'categories' => $categories,
            'entities' => $entities,
            'currentEntity' => $currentEntity
        ]);
    }

    public function store(Request $request, $order = null) { //post 1
        $validator = $request->validate([
            'image_content' => 'required|image|mimetypes:image/jpeg,image/png',
            'image_intro' => 'required|image|mimetypes:image/jpeg,image/png',
            'code' => 'required|unique:pages|alpha_dash|string|min:1|max:100',
            'caption_ua' => 'required|string|min:3|max:100',
            'caption_en' => 'required|string|min:3|max:100'
        ]);


        $page = new Page();
        $page->code = $request->input('code');
        $page->caption_ua = $request->input('caption_ua');
        $page->caption_en = $request->input('caption_en');
        $page->content_ua = $request->input('content_ua');
        $page->content_en = $request->input('content_en');
        $page->intro_ua = $request->input('intro_ua');
        $page->intro_en = $request->input('intro_en');
        $page->parent_id = $request->input('parent');

        $page->entity_id = $request->entity_id;

        $extensionIntro = $request->file('image_intro')->getClientOriginalExtension();
        $extensionContent = $request->file('image_content')->getClientOriginalExtension();

        $page->image_content = $page->code."_content.".$extensionContent;
        $page->image_intro = $page->code."_intro.".$extensionIntro;

        $path = $request->image_content->storeAs('images', $page->image_content, 'public');
        $path = $request->image_intro->storeAs('images', $page->image_intro, 'public');

        $page->save();

        $currentEntity = Entity::find($request->input('entity_id'));
        if($currentEntity->name != 'empty'){
            foreach ($currentEntity->fields as $field) {
                $fieldvalue = new Fieldvalue;
                $fieldvalue->field_id = $field->id;
                $fieldvalue->value = $request->input($field->name);
                $fieldvalue->page()->associate($page);
                $fieldvalue->save();
            }
        }

       return redirect()->route('pages.show', $page->code);
    }

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

    public function index($order = null) {
        return $this->show('root');
    }


    public function userIndex($order = null) {
        $page = Page::where('code', 'root')->first();
        return $page->render(false, $order);
    }

    public function edit($code, $order = null) { // get 2
        $page = Page::where('code', $code)->first();
        return view('editPage', ['page' => $page]);
    }

    public function update(Request $request, $code, $order = null) { // put 2
        $page = Page::where('code', $code)->first();

        $rules = [
            'image_content' => 'image|mimetypes:image/jpeg,image/png',
            'image_intro' => 'image|mimetypes:image/jpeg,image/png',
            'caption_ua' => 'required|string|min:3|max:100',
            'caption_en' => 'required|string|min:3|max:100',
            'content_ua' => 'required|string|min:20|max:2000',
            'content_en' => 'required|string|min:20|max:2000',
            'intro_ua' => 'required|string|min:20|max:750',
            'intro_en' => 'required|string|min:20|max:750',
            'code' => [
                'required','alpha_dash','string','min:1','max:100',
                Rule::unique('pages')->ignore($page->code, 'code'),
            ],
        ];

        if ($page->entity->name != 'empty'){
            foreach ($page->entity->fields as $field){
                $rules[$field->name] =  'required|string|min:3|max:250';
            }
        }

        $validator = $request->validate($rules);

        $page->caption_ua = $request->input('caption_ua');
        $page->caption_en = $request->input('caption_en');
        $page->content_ua = $request->input('content_ua');
        $page->content_en = $request->input('content_en');
        $page->intro_ua = $request->input('intro_ua');
        $page->intro_en = $request->input('intro_en');
        $page->parent_id = $request->input('parent');

        if ($page->entity->name != 'empty'){
            foreach ($page->entity->fields as $field){
                $field = Fieldvalue::updateOrCreate( 
                    ['page_id' => $page->id, 'field_id' => $field->id],
                    ['value' => $request->input($field->name)]
                );
                $field->save();
            }
        }

        // IMAGES
        if ($request->file('image_intro') && $request->file('image_intro')->isValid()) {
            Storage::disk('public')->delete('images/' . $page->image_intro);
            $extensionIntro = $request->file('image_intro')->getClientOriginalExtension();
            $page->image_intro = $request->input('code') . "_intro." . $extensionIntro;
            $path = $request->image_intro->storeAs('images', $page->image_intro, 'public');
            $old_extension_intro = pathinfo($page->image_intro, PATHINFO_EXTENSION);
            $new_image_intro =  $request->input('code') . "_intro." . $old_extension_intro;
            Storage::disk('public')->move('images/' . $page->image_intro, 'images/' . $new_image_intro);
            $page->image_intro = $new_image_intro;
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

    public function destroy($code, $order = null) {
        $page = Page::where('code', $code)->first();
        Storage::disk('public')->delete('images/' . $page->image_content);
        Storage::disk('public')->delete('images/' . $page->image_intro);
        $page->fieldvalues()->delete();
        $page->delete();
        return redirect()->route('pages.index');
    }
}
