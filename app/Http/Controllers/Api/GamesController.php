<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Games;
use App\Http\Resources\GamesResource;
use App\Http\Requests\StoreUpdateGamesRequest;

class GamesController extends Controller
{
    public function index(){
        $games = Games::paginate();
        return GamesResource::collection($games);
    }

    public function store(StoreUpdateGamesRequest $request){
        
        $data = $request->validated();

        $games = Games::create($data);
        
        return new GamesResource($games);
    }

    public function show(string $id){
        $games = Games::findOrFail($id);
        return new GamesResource($games);
    }

    public function update(StoreUpdateGamesRequest $request, string $id){

        $data  = $request->validated();
        $games = Games::findOrFail($id);
        $games ->update($data);
        return new GamesResource($games);
    }
    public function destroy(string $id){
        $games = Games::findOrFail($id);
        $games->delete();
        return response()->noContent();    
    }
}
