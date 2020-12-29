<?php

namespace App\Http\Controllers;

use App\Page;
use App\Entity;
use App\Fieldvalue;
use App\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FieldController extends Controller {
    public function store(Request $request) {
        $validator = $request->validate([
            'name' => 'required|unique:entities|alpha_dash|string|min:3|max:100'
        ]);
        $entity = Entity::find($request->entity_id);
        $field = new Field();
        $field->name = $request->name;
        $field->caption = $request->caption;
        $field->order_num = $request->order_num;
        $field->entity()->associate($entity);
        $field->save();
        return redirect()->route('entities.show', $request->entity_id);
    }

    public function edit($id) {
        $field = Field::find($id);
        return view('editField', ['field' => $field]);
    }

    public function update(Request $request, $id) {
        $field = Field::find($id);
        $validator = $request->validate([
            'name' => 'required|unique:entities|alpha_dash|string|min:3|max:100'
        ]);
        $field->name = $request->name;
        $field->caption = $request->caption;
        $field->order_num = $request->order_num;
        $field->save();
        return redirect()->route('entities.edit', $field->entity->id);
    }

    public function destroy($id) {
       $field = Field::find($id);
       if(count($field->fieldvalues) == 0){
            $field->delete();
        }
        return redirect()->route('entities.edit',  $field->entity->id);
    }
}
