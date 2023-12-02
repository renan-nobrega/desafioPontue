<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class GamesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'identify' => $this->id,
          'titulo' => $this->titulo,
          'genero' => $this->genero,
          'plataforma' => $this->plataforma,
          'valor' => $this->valor,
          'created' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
