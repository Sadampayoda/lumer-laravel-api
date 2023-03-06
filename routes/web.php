<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
// use app\Models\penjualan;
use App\Models\User;
use Illuminate\Http\Request;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'penjualan-sadam'],function() use ($router){


    $router->get('/', function(){
        $returnData = User::allData();
        return response()->json($returnData);
    });

    $router->get('/{id}', function($id){
        
        $returnData = User::findData($id);
        return response()->json($returnData);

    });

    $router->post('/',function(Request $request){
        $id = $request->input('id');
        $name = $request->input('nama');
        $kategori = $request->input('kategori');
        $harga = $request->input('harga');

        if($id == null || $name == null || $kategori == null || $harga == null)
        {
            return response()->json([
                'msg' => 'data tidak valid'
            ]);
        }

        return response()->json([
            'barang' => [
                'id' => $id,
                'nama' => $name,
                'kategori' => $kategori,
                'harga' => $harga
            ],
            'status' => [
                'msg' => 'data berhasil di tambahkan',
                'status' => 202
            ]
        ]);
    });

    $router->put('/{id}/update', function(Request $request,$id){
        $getData = User::findData($id);
        
        $nama= $request->input('nama');
        $kategori = $request->input('kategori');
        $harga = $request->input('harga');

        return response()->json([
            'barang' => 
                [            
                    'id' => $id,
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'harga' => $harga
                ],
                
            'status' => [
                'msg' => 'data berhasil di update'
            ]
        ]);
    });
});
