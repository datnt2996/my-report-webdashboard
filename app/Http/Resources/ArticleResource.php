<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'Description' => $this->Description,
            'ManagerID'=>$this->ManagerID,
            'ImageUrl' => $this->ImageUrl,
            'Content' => $this->Content,
            'TimeUpLoad' => $this->TimeUpLoad,
             'rating' => $this->sum('id'),
             'href' => [
                'review' => route('articles.index',$this->id)
            ]
        ];
    }
}
/*,
            'href' => [
                'review' => route('articles.index',$this->id)
            ] */
