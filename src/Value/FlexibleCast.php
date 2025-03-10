<?php

namespace Whitecube\NovaFlexibleContent\Value;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class FlexibleCast implements CastsAttributes
{
    use HasFlexible;

    /**
     * @var array
     */
    protected $layouts = [];

    /**
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @return \Whitecube\NovaFlexibleContent\Layouts\Collection|array<\Whitecube\NovaFlexibleContent\Layouts\Layout>
     */
    public function get($model, string $key, $value, array $attributes)
    {
        $this->model = $model;

        return $this->cast($value, $this->getLayoutMapping());
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }

    protected function getLayoutMapping()
    {
        return $this->layouts;
    }
}
