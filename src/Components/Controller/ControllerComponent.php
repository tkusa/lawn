<?php

namespace Tkusa\Lawn\Components\Controller;


class ControllerComponent
{

    /**
     * Call function from string
     */
    public static function call($str)
    {
        switch ($str) {
            case 'index':
                return self::index();
            case 'create':
                return self::create();
            case 'store':
                return self::store();
            case 'show':
                return self::show();
            case 'edit':
                return self::edit();
            case 'update':
                return self::update();
            case 'destroy':
                return self::destroy();

            default:
                return "";
        }
    }

    /**
     * GetBase
     */
    public static function base()
    {
        $base = file_get_contents(__DIR__.'/base.txt');
        return $base;
    }

    /**
     * Get index function string for controller
     */
    public static function index()
    {
        $func = '
        public function index(Request $request)
        {
            $%names% = %Name%::all()->paginate();
            return view("lawn.%name%.index",compact($%names%));
        }
        ';
        return $func;
    }


    /**
     * Get create function string for controller
     */
    public static function create()
    {
        $func = '
        public function create(Request $request)
        {
            return view("lawn.%name%.create");
        }
        ';
        return $func;
    }

    /**
     * Get store function string for controller
     */
    public static function store()
    {
        $func = '
        public function store(%Name%Request $request)
        {
            $form = $request->all();
            unset($form["_token"]);

            $%name% = new %Name%;
            $%name%->fill($form)->save();

            return redirect()->route("lawn.%name%.index");
        }
        ';
        return $func;
    }

    /**
     * Get show function string for controller
     */
    public static function show()
    {
        $func = '
        public function show(Request $request, $id)
        {
            $%name% = %Name%::find($id);
            return view("lawn.%name%.show",compact($%name%));
        }
        ';
        return $func;
    }

    /**
     * Get edit function string for controller
     */
    public static function edit()
    {
        $func = '
        public function edit(Request $request, $id)
        {
            $%name% = %Name%::find($id);
            return view("lawn.%name%.edit",compact($%name%));
        }
        ';
        return $func;
    }

    /**
     * Get update function string for controller
     */
    public static function update()
    {
        $func = '
        public function update(%Name%Request $request, $id)
        {
            $%name% = %Name%::find($id);

            $form = $request->all();
            unset($form["_token"]);

            $%name%->fill($form)->save();
            return redirect()->route("lawn.%name%.show",compact($id));
        }
        ';
        return $func;
    }

    /**
     * Get destroy function string for controller
     */
    public static function destroy()
    {
        $func = '
        public function destroy(Request $request, $id)
        {
            $%name% = %Name%::find($id);
            return redirect()->route("lawn.%name%.index");
        }
        ';
        return $func;
    }
}
