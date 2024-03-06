<?php

namespace App\Http\Controllers;
use App\Models\Ville;
use App\Models\Habitant;
use Illuminate\Http\Request;

use App\Http\Requests\HabitantRequest;
use Illuminate\Support\Facades\Storage;

class HabitantController extends Controller
{
    public function index(){
        $habitants = Habitant::paginate(5);
        return view("habitants.index",compact('habitants'));
    }

    public function create(){
        $villes = Ville::all();
        return view('habitants.create',compact('villes'));
    }

    public function store(HabitantRequest $request){
        $habitant = new Habitant();
        $habitant->cin = $request->cin;
        $habitant->nom = $request->nom;
        $habitant->prenom = $request->prenom;
        $habitant->ville_id = $request->ville_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photoPath = $image->store('habitants/images', 'public');
            $habitant->image = $photoPath;
        }
        $habitant->save();
        return redirect("/list")->with("msg","user created successful");
    }
    public function edit($id){
    $habitant = Habitant::find($id);
    $villes = Ville::all();
    return view('habitants.edit', compact('habitant','villes'));
    }
    public function update(HabitantRequest $request, $id){
        $habitant = Habitant::find($id);
        $habitant->cin = $request->cin;
        $habitant->nom = $request->nom;
        $habitant->prenom = $request->prenom;
        $habitant->ville_id = $request->ville_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $photoPath = $image->store('habitants/images', 'public');
            $habitant->image = $photoPath;
        }
        $validated = $request->validated();
        $habitant->fill($validated)->update();
        return redirect("/list")->with("msgupdate","user Modifier avec successfuly");
    }

    public function destroy($id){
        $habitant = Habitant::find($id);
        if ($habitant->image) {
            Storage::disk('public')->delete($habitant->image);
        }
        $habitant->delete();
        return redirect("/list")->with("msgdelete","user supprimer avec successfuly");
    }
}
