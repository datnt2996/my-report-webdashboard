<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ArticleCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
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
            'href' => [
                'link' => route('articles.show',$this->id)
            ]
        ];
    }
}
