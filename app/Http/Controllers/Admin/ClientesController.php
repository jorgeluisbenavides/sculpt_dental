<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//add
use App\Http\Requests\CreateCustomerRequest;

use Illuminate\Support\Facades\Storage;

use App\Occupation;
use App\Customer;

use File;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupations = Occupation::orderBy('title', 'ASC')->pluck('title', 'id');

        return view('admin.clientes.index_cli', compact('occupations') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {

        $customer = $request->all();

        $customer['name']          = ucfirst( $customer['name'] );
        $customer['last_name_one'] = ucfirst( $customer['last_name_one'] );
        $customer['last_name_two'] = ucfirst( $customer['last_name_two'] );
        $customer['address']       = ucfirst( $customer['address'] );

        $customer = Customer::create( $customer );

        //no se cargo foto, se agrega un avatar
        if ( $request->file('img_name') ) {
            $path_img = Storage::disk('public_folder')->put('customers',  $request->file('img_name'));
            $customer->fill(['img_name' => $path_img ] )->save();
        }else{
            //se coloca el avatar si no se agrego archivo, depende del sexo
            ( $customer['sex'] == 'Masculino' ) ? $img = 'customers/avatar_male.png' : $img = 'customers/avatar_female.png';
            $customer->fill(['img_name' => $img ] )->save();
        }

        return  redirect()->route('cli_index')->with('info', $customer->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $customer = Customer::find($id);

        return view('admin.clientes.profile', compact('customer') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $customer    = Customer::find($id);
        $occupations = Occupation::orderBy('title','ASC')->pluck('title','id');

        return view('admin.clientes.edit', compact('customer','occupations') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        $customer->fill( $request->all() )->save();

        return redirect()->route('clientes.show', $customer->id )->with('info','Se han actualizado datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
