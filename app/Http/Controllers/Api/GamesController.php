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

        if (!is_array($data)) {
            return response()->json(['error' => 'Invalid data format.'], 400);
        }
    
        if (isset($data[0]) && is_array($data[0])) {
            $games = collect($data)->map(function ($item) {
                return Games::create($item);
            });
        } else {
            $games = Games::create($data);
        }
        return GamesResource::collection($games);
    }

    public function show(string $ids){
        $idsArray = explode(',', $ids);
    
        $games = Games::findOrFail($idsArray);
    
        return GamesResource::collection($games);
    }

    public function update(StoreUpdateGamesRequest $request, $ids)
    {
        $data = $request->validated();
    
        $idArray = explode(',', $ids);
    
        foreach ($idArray as $id) {
            $game = Games::find($id);
    
            if (!$game) {
                return response()->json(['message' => "Registro com o ID $id não encontrado."], 404);
            }
    
            if (isset($data[$id])) {
                $game->fill($data[$id])->save();
            }
        }
    
        return response()->json(['message' => 'Records updated successfully.']);
    }
    
    public function destroy($ids){
        $idArray = explode(',', $ids);

        foreach ($idArray as $id) {
            $game = Games::findOrFail($id);
            if ($game) {
            $game->delete();
            }
        }
        return response()->noContent();
    }
}
