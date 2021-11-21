<?php

namespace Tkusa\Lawn\Http\Controllers;

use Illuminate\Http\Request;
use Tkusa\Lawn\Http\Controllers\Controller as BaseController;
use Tkusa\Lawn\Http\Requests\ModelRequest;
use Tkusa\Lawn\Models\Model;


class ModelController extends BaseController
{

        public function index(Request $request)
        {
            $models = Model::get();
            return view("lawn.model.index",compact($models));
        }

        public function create(Request $request)
        {
            return view("lawn.model.create");
        }

        public function store(ModelRequest $request)
        {
            $form = $request->all();
            unset($form["_token"]);

            $model = new Model;
            $model->fill($form)->save();

            return redirect()->route("lawn.model.index");
        }

        public function show(Request $request, $id)
        {
            $model = Model::find($id);
            return view("lawn.model.show",compact($model));
        }

        public function edit(Request $request, $id)
        {
            $model = Model::find($id);
            return view("lawn.model.edit",compact($model));
        }

        public function update(ModelRequest $request, $id)
        {
            $model = Model::find($id);

            $form = $request->all();
            unset($form["_token"]);

            $model->fill($form)->save();
            return redirect()->route("lawn.model.show",compact($id));
        }

        public function destroy(Request $request, $id)
        {
            $model = Model::find($id);
            return redirect()->route("lawn.model.index");
        }

}
