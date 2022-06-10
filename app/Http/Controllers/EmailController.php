<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($uid)
    {
        $cliente = DB::table('clientes')
            ->where('uid', $uid)->get();
        return view('email.create')->with('cliente', $cliente);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = new Email();
        $email->cliente_id = $request->input('cliente_id');
        $email->emailPrincipal  = $request->input('emailPrincipal');
        $email->emailSecundario = $request->input('emailSecundario');
        //dd($email->getAttributes());

        if(empty($request->input('emailPrincipal'))){
            $email->emailPrincipal  = '.';
        }
        if(empty($request->input('emailSecundario'))){
            $email->emailSecundario = '.';
        }

        try {
            $email->save();
            return redirect('/cliente/show/' . $request->uid);
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
