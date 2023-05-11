<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    //aqui va estar la funcion index para la vista

    public function index(){
        //Variable para mostrar los datos de la bd

        $datos = DB::select(" select * from juguetes ");

        return view("welcome") -> with("datos",$datos);
    
    }

    public function create(Request $request){
        //variable sql para guardar registros

        try {
            $sql = DB::insert(" insert into juguetes(nombre, precio, cantidad) values (?,?,?) ", [
                $request -> txtNombre,
                $request -> txtPrecio,
                $request -> txtCantidad
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }

        if ($sql==true) {
            return back()->with("correct","REGISTRO EXITOSO");
        } else {
            return back()->with("incorrect","ERROR INESPERADO");
        }
        

    }

    public function update(Request $request){
        try {
            
            $sql=DB::update(" update juguetes set nombre=?, precio=?, cantidad=? where id=? ", [
                $request -> txtNombre,
                $request -> txtPrecio,
                $request -> txtCantidad,
                $request -> txtcodigo,
            ]);

        } catch (\Throwable $th) {
            $sql=0;
        }

        if ($sql==true) {
            return back()->with("correct","REGISTRO EXITOSO");
        } else {
            return back()->with("incorrect","ERROR INESPERADO");
        }

    }

    public function delete($identify){
        try {
            $sql = DB::delete(" delete from juguetes where id=$identify ");
        } catch (\Throwable $th) {
            $sql=0;
        }

        if ($sql==true) {
            return back()->with("correct","Borrado Exitoso");
        } else {
            return back()->with("incorrect","Borrado Fallido");
        }
    }

}
