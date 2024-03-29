<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;




class RoleController extends Controller
{

    public function __construct(){

        $this->middleware('permission:roles.create')->only(['create', 'store']);

        $this->middleware('permission:roles.index')->only('index');

        $this->middleware('permission:roles.edit')->only(['edit', 'update']);

        $this->middleware('permission:roles.show')->only('show');

        $this->middleware('permission:roles.destroy')->only('destroy    ');;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'ASC')->paginate();

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create([
            "name" => $request->name,
            "slug" => $request->slug.('.sistmas'),
            "description"=> $request->description,
        ]);

        
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')->with('info', 'Role Registrada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {   
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Role $role)
    {
        $permissions = Permission::get();
        return view('roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        //Actualizar rol

        $role->update([
            "name" => $request->name,
            "slug" => $request->slug.('.sistemas'),
            "description" => $request->description,
        ]);
       
        //Actualizar permisos
        
        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index', $role->id)->with('info', 'Rol Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('info', 'Eliminado con éxito');
    }
}
