<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caidp;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Caidps = Caidp::where('id', "!=", \Auth::user()->caidp_id)->get();
        return view('admin.userList', compact('Caidps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nouveau()
    {
        $Responsables = Caidp::distinct('qualite')->get('qualite');
        return view('admin.nouveau', compact('Responsables')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        $caidps = null;
        if(!is_null($id)){
            $caidps = Caidp::findOrFail($id);
        }
        $Responsables = Caidp::distinct('qualite')->get('qualite');
        return view('admin.param', compact('caidps', 'Responsables')); 
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
    public function update(Request $request) 
    { 

        $request->validate([
            'nom' => 'required|',
            'prenom' => 'required|',
            'civilite' => 'required|',
            'contact' => 'required|',
            'email' => 'required|email',
            'qualite' => 'required|',
            'password' => 'nullable|min:4|'
        ]);
        if(isset($request->caidp_id) && !is_null($request->caidp_id)){
            $caidp = Caidp::findOrFail($request->caidp_id);
            $message = "modification effectuée avec succès.";
        }else{
            $caidp = New Caidp;
            $message = "Utilisateur ajouté avec succès.";
        }

        $caidp->nom = $request->nom;
        $caidp->prenom = $request->prenom;
        $caidp->civilite = $request->civilite;
        $caidp->contact = $request->contact;
        $caidp->email = $request->email;
        $caidp->autreContact = null;
        $caidp->qualite = $request->qualite;
        if($caidp->save()){
            $createUser = new UserController;
            $createUser->nom = $request->nom." ".$request->prenom;
            $createUser->email = $request->email;
            $createUser->pseudo = $request->email;
            $createUser->caidp = true;
            $createUser->caidp_id = isset($request->caidp_id) && !is_null($request->caidp_id) ? $request->caidp_id : $this->getLastCaidp()->id;
            if(isset($request->caidp_id) && $request->caidp_id){
                $createUser->user_id = \App\User::whereCaidpId($request->caidp_id)->first()->id;
            }
            // dd($createUser);
            $saveuser = $createUser->createUser($createUser, $request->password);
            return redirect()->route('admin.Home')->with('success', $message); 
        }else{
            redirect()->back()->with('error', 'La modification à échoué ');
        }
    }

    public function getLastCaidp(){
        return Caidp::orderBy('id', 'DESC')->first();
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
