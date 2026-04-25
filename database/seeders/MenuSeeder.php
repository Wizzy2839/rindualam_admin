<?php

namespace Database\Seeders;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'SIGNATURE COFFEE',
                'sort_order' => 1,
                'items' => [
                    ['name' => 'Coffee Cube Latte', 'price' => 22000],
                    ['name' => 'Kopi Susu Kelana', 'price' => 15000],
                    ['name' => 'The Great Mocktee', 'price' => 22000],
                ]
            ],
            [
                'name' => 'ESPRESSO BASED',
                'sort_order' => 2,
                'items' => [
                    ['name' => 'Espresso', 'price' => 12000],
                    ['name' => 'Americano / Long Black', 'price' => 15000],
                    ['name' => 'Piccolo', 'price' => 18000],
                    ['name' => 'Cappuccino', 'price' => 20000],
                    ['name' => 'Cafe Latte', 'price' => 20000],
                    ['name' => 'Flat White', 'price' => 18000],
                ]
            ],
            [
                'name' => 'ES KOPI SUSU BASED',
                'sort_order' => 3,
                'items' => [
                    ['name' => 'Es Kopi Susu Rindu', 'price' => 18000],
                    ['name' => 'Es Kopi Susu Alam', 'price' => 18000],
                    ['name' => 'Es Kopi Susu Vanila', 'price' => 20000],
                    ['name' => 'Es Kopi Susu Karamel', 'price' => 20000],
                    ['name' => 'Es Kopi Susu Hazelnut', 'price' => 20000],
                ]
            ],
            [
                'name' => 'DAILY BREW',
                'sort_order' => 4,
                'items' => [
                    ['name' => 'Filter Single Origin', 'price' => 20000],
                    ['name' => 'Filter Guest Beans', 'price' => 22000],
                    ['name' => 'Vietnam Drip', 'price' => 15000],
                ]
            ],
            [
                'name' => 'SPECIAL WHITE COFFEE',
                'sort_order' => 5,
                'items' => [
                    ['name' => 'Baileys Latte', 'price' => 22000],
                    ['name' => 'Butterscotch Latte', 'price' => 22000],
                    ['name' => 'Rum Regal Latte', 'price' => 22000],
                    ['name' => 'Classic Caramel Macchiato', 'price' => 22000],
                    ['name' => 'Madu Aren Latte', 'price' => 18000],
                    ['name' => 'Cinnamon Sweet Latte', 'price' => 18000],
                ]
            ],
            [
                'name' => 'MIXOLOGY',
                'sort_order' => 6,
                'items' => [
                    ['name' => 'Midnight Blue', 'price' => 22000],
                    ['name' => 'Tropical Sunrise', 'price' => 22000],
                    ['name' => 'Purple Rain', 'price' => 22000],
                ]
            ],
            [
                'name' => 'PURE',
                'sort_order' => 7,
                'items' => [
                    ['name' => 'Choco', 'price' => 20000],
                    ['name' => 'Matcha', 'price' => 20000],
                    ['name' => 'Taro', 'price' => 20000],
                    ['name' => 'Red Velvet', 'price' => 20000],
                ]
            ],
            [
                'name' => 'KOMBUCHA',
                'sort_order' => 8,
                'items' => [
                    ['name' => 'Hibiscus & Berries', 'price' => 22000],
                    ['name' => 'Lemongrass & Ginger', 'price' => 22000],
                    ['name' => 'Blackcurrant & Blueberries', 'price' => 22000],
                ]
            ],
            [
                'name' => 'FRAPPE',
                'sort_order' => 9,
                'items' => [
                    ['name' => 'Red Velvet Frappe', 'price' => 22000],
                    ['name' => 'Choco Frappe', 'price' => 22000],
                    ['name' => 'Matcha Frappe', 'price' => 22000],
                    ['name' => 'Taro Frappe', 'price' => 22000],
                    ['name' => 'Cookies & Cream Frappe', 'price' => 22000],
                ]
            ],
            [
                'name' => 'BASIC TEA',
                'sort_order' => 10,
                'items' => [
                    ['name' => 'Sweet / Plain Tea', 'price' => 5000],
                    ['name' => 'Lemon Tea', 'price' => 12000],
                ]
            ],
            [
                'name' => 'SPECIAL TEA',
                'sort_order' => 11,
                'items' => [
                    ['name' => 'Rosella Tea', 'price' => 15000],
                ]
            ],
        ];

        foreach ($data as $catData) {
            $category = MenuCategory::create([
                'name' => $catData['name'],
                'sort_order' => $catData['sort_order'],
            ]);

            foreach ($catData['items'] as $itemData) {
                MenuItem::create([
                    'menu_category_id' => $category->id,
                    'name' => $itemData['name'],
                    'price' => $itemData['price'],
                    'description' => null,
                    'is_available' => true,
                ]);
            }
        }
    }
}
