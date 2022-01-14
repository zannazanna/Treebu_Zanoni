<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function create(Request $req){
        $newLand = json_decode($req->getContent());
        $land = new Land();
        $land->comune = $newLand->comune;
        $land->foto = $newLand->foto;
        $land->dimensione = $newLand->dimensione;
        $land->foglio_catastale = $newLand->foglio_catastale;
        $land->mappale_catastale = $newLand->mappale_catastale;
        $land->parcella_catastale = $newLand->parcella_catastale;
        $land->terreno = $newLand->terreno;
        $land->irrigazione = $newLand->irrigazione;
        $land->offerta = $newLand->offerta;
        $land->canone = $newLand->canone;
        $land->disponibile = $newLand->disponibile;
        $land->save();
        return response()->json("create",200);
    }

    public function allLand(){
        return Land::orderBy("created_at","DESC")->get();
    }

    public function land($id){
        return Land::where("id",$id)->first();
    }

    public function modify(Request $req, $id){
        $newLand = json_decode($req->getContent());
        $land = Land::where("id",$id)->first();
        $land->comune = $newLand->comune;
        $land->foto = $newLand->foto;
        $land->dimensione = $newLand->dimensione;
        $land->foglio_catastale = $newLand->foglio_catastale;
        $land->mappale_catastale = $newLand->mappale_catastale;
        $land->parcella_catastale = $newLand->parcella_catastale;
        $land->terreno = $newLand->terreno;
        $land->irrigazione = $newLand->irrigazione;
        $land->offerta = $newLand->offerta;
        $land->canone = $newLand->canone;
        $land->disponibile = $newLand->disponibile;
        $land->save();
        return response()->json("modify",201);

    }

    public function dimensione(Request $req){
        $OrdeLand = json_decode($req->getContent());
        return Land::orderBy("dimensione",$OrdeLand->name)->get();
    }
}
