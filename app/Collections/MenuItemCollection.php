<?php
declare(strict_types=1);

namespace App\Collections;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Collection;

final class MenuItemCollection extends Collection
{
    /**
     * Make tree parent_id => id
     * @return $this
     */
    public function tree(): self
    {
        if ($this->isEmpty()) {
            return new static;
        }

        $menu = [];

        /**
         * @TODO 2 levels only, make recursive
         */
        foreach ($this->items as $menuItem) {
            if (!$menuItem->parent_id) {
                $menuItem['child'] = array_filter($this->items, function ($subMenuItem) use ($menuItem) {
                    return $subMenuItem->parent_id == $menuItem->id;
                });

                if (!isset($menu[$menuItem->menu->slug])) {
                    $menu[$menuItem->menu->slug] = [
                        'title' => $menuItem->menu->title,
                        'slug' => $menuItem->menu->slug,
                        'items' => []
                    ];
                }

                $menu[$menuItem->menu->slug]['items'][] = $menuItem;
            }
        }

        return new static(array_values($menu));
    }

    /**
     * Get items of menu type
     * @param string $menuType
     * @return array
     */
    public function getMenuItems(string $menuType): array
    {
        $menu = $this->filter(function (array $menu) use ($menuType) {
            return $menu['slug'] == $menuType;
        })->first();

        return $menu ? $menu['items'] : [];
    }

    /**
     * Get menu title by type
     * @param string $menuType
     * @return string
     */
    public function getMenuTitle(string $menuType): string
    {
        $menu = $this->filter(function (array $menu) use ($menuType) {
            return $menu['slug'] == $menuType;
        })->first();

        return $menu ? $menu['title'] : '';
    }
}
