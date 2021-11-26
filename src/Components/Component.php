<?php
namespace Tkusa\Lawn\Components;

class Component
{
    /**
     * Get const by name
     */
    public static function get($name)
    {
        return constant('self::'.$name);
    }

    // Controller
    const CONTROLLER_INDEX = '
    public function index(Request $request)
    {
        $%names% = %Name%::all()->paginate();
        return view("lawn.%name%.index",compact($%names%));
    }
    ';

    const CONTROLLER_CREATE = '
    public function create(Request $request)
    {
        return view("lawn.%name%.create");
    }
    ';

    const CONTROLLER_STORE = '
    public function store(%Name%Request $request)
    {
        $form = $request->all();
        unset($form["_token"]);

        $%name% = new %Name%;
        $%name%->fill($form)->save();

        return redirect()->route("lawn.%name%.index");
    }
    ';

    const CONTROLLER_SHOW = '
    public function show(Request $request, $id)
    {
        $%name% = %Name%::find($id);
        return view("lawn.%name%.show",compact($%name%));
    }
    ';

    const CONTROLLER_EDIT = '
    public function edit(Request $request, $id)
    {
        $%name% = %Name%::find($id);
        return view("lawn.%name%.edit",compact($%name%));
    }
    ';

    const CONTROLLER_UPDATE = '
    public function update(%Name%Request $request, $id)
    {
        $%name% = %Name%::find($id);

        $form = $request->all();
        unset($form["_token"]);

        $%name%->fill($form)->save();
        return redirect()->route("lawn.%name%.show",compact($id));
    }
    ';

    const CONTROLLER_DESTROY = '
    public function destroy(Request $request, $id)
    {
        $%name% = %Name%::find($id);
        $%name%->delete();
        return redirect()->route("lawn.%name%.index");
    }
    ';

    // Route
    const ROUTE_INDEX = '
    Route::get("/%name%", "%Name%Controller@index")->name("%name%.index");
    ';

    const ROUTE_CREATE = '
    Route::get("/%name%/create", "%Name%Controller@create")->name("%name%.create");
    ';

    const ROUTE_STORE = '
    Route::post("/%name%", "%Name%Controller@store")->name("%name%.store");
    ';

    const ROUTE_SHOW = '
    Route::get("/%name%", "%Name%Controller@index")->name("%name%.index");
    ';

    const ROUTE_EDIT = '
    Route::get("/%name%/edit", "%Name%Controller@edit")->name("%name%.edit");
    ';

    const ROUTE_UPDATE = '
    Route::put("/%name%", "%Name%Controller@update")->name("%name%.update");
    ';

    const ROUTE_DESTROY = '
    Route::delete("/%name%", "%Name%Controller@destroy")->name("%name%.destroy");
    ';


    //Feature Test
    const TEST_FEATURE_INDEX = '
    public function test_index()
    {
        $response = $this->get("/%name%");

        $response->assertStatus(200);
    }
    ';

    const TEST_FEATURE_CREATE = '
    public function test_create()
    {
        $response = $this->get("/%name%/create");

        $response->assertStatus(200);
    }
    ';

    const TEST_FEATURE_STORE = '
    public function test_store()
    {
        $data = %Name%::factory()->raw();
        $response = $this->post("/%name%", $data);

        $response->assertStatus(200);
    }
    ';

    const TEST_FEATURE_SHOW = '
    public function test_show()
    {
        $response = $this->get("/%name%/1");

        $response->assertStatus(200);
    }
    ';

    const TEST_FEATURE_EDIT = '
    public function test_edit()
    {
        $response = $this->get("/%name%/1/edit");

        $response->assertStatus(200);
    }
    ';

    const TEST_FEATURE_UPDATE = '
    public function test_update()
    {
        $data = %Name%::factory()->raw();
        $response = $this->put("/%name%/1", $data);

        $response->assertStatus(200);
    }
    ';

    const TEST_FEATURE_DESTROY = '
    public function test_destroy()
    {
        $response = $this->delete("/%name%/1");

        $response->assertStatus(200);
    }
    ';

    //Unit Test
    const TEST_UNIT_INSERT = '
    public function test_insert()
    {
        $%name% = %Name%::factory()->create();
        $data = [
            "id" => $%name%->id,
        ];
        $this->assertDatabaseHas($%name%, $data);
    }
    ';

    const TEST_UNIT_SELECT = '
    public function test_select()
    {
        $%name% = %Name%::factory()->create();
        $found = %Name%::find($%name%->id);

        $this->assertTrue($found);
        $this->assertEquals($%name%->id, $found->id);
     }
    ';

    const TEST_UNIT_UPDATE = '
    public function test_update()
    {
        $%name% = %Name%::factory()->create();
        $updated = $%name%->updated_at;

        $data = %Name%::factory()->raw();
        $%name%->fill($data)->save();
        $this->assertTrue($updated < $%name%->updated_at);
    }
    ';

    const TEST_UNIT_DELETE = '
    public function test_delete()
    {
        $%name% = %Name%::factory()->create();
        $data = [
            "id" => $%name%->id,
        ];
        $this->assertDatabaseHas($%name%, $data);

        $%name%->delete();
        $this->assertDatabaseMissing($%name%, $data);
    }
    ';

}
