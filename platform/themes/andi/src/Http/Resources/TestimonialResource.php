<?php
namespace Theme\AnDi\Http\Resources;
use BaseHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use RvMedia;
class TestimonialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => BaseHelper::clean($this->content),
            'company' => $this->company,
            'image' => RvMedia::getImageUrl($this->image, null, false, RvMedia::getDefaultImage()),
        ];
    }
}
