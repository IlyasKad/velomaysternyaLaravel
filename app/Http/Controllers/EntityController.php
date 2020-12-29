<?php

namespace App\Http\Controllers;

use App\Page;
use App\Entity;
use App\Fieldvalue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class EntityController extends Controller {
    public function show($id) {
        $entity = Entity::find($id);
        return view("showEntity", ['entity' => $entity]);
    }

    public function create() {
        $entities = Entity::All();
        return view("createEntity", ['entities' => $entities]);
    }

    public function store(Request $request) { //post 1
        $validator = $request->validate([
            'name' => 'required|unique:entities|alpha_dash|string|min:5|max:100'
        ]);
        $entity = new Entity();
        $entity->name = $request->name;
        $entity->save();
        return redirect()->route('entities.create');
    }

    public function edit($id) {
        $entity = Entity::find($id);
        return view('editEntity', ['entity' => $entity]);
    }

    public function update(Request $request, $id) {
        $entity = Entity::find($id);
        $validator = $request->validate([
            'name' => 'required|min:2|max:200',
        ]);
        $entity->name = $request->name;
        $entity->save();
        return redirect()->route('entities.create');
    }

    public function destroy($id) {
        $entity = Entity::find($id);
        if(count($entity->pages) == 0){
            $entity->fields()->delete();
            $entity->delete();
        }
        return redirect()->route('entities.create');
    }
}
