<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    
	
    public function index()
    {
        $estudiante = Estudiante::with("user")->get();
		return response()->json($estudiante);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario= new User();
        $usuario->email= $request->email;
        $usuario->password= Hash::make($request->password);
        $usuario->save();
        
        $estudiante =new Estudiante();
        $estudiante->name=$request->name;
        $estudiante->user_id=$usuario->id;
        $estudiante->last_name=$request->last_name;
        $estudiante->save();

		return response()->json(["mensaje"=>"Creado correctamente"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::find($id);
        
        return response()->json($estudiante);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
       	$estudiante = Estudiante::find($id);
        $estudiante->fill($request->all());
		$estudiante->save();
		return response()->json(["mensaje"=>"Actualizacion exitosa"]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
    }

    public function authenticate(Request $request)
    {
        $email=$request->email;
        $password=$request->password;
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
           return response()->json(["auth"=>"true"]);
        }else{
            return response()->json(["auth"=>"false"]);
        }
    }

}
