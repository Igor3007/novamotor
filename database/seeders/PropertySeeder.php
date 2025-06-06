<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            'Мощность, кВт' => '0,18',
            'Номинальная частота вращения, об/мин' => 3000,
            'Фактическая частота вращения, об/мин' => 2720,
            'Номинальный ток, А (при U=380В)' => '0,53',
            'Напряжение, В' => '220/380 ( Δ / Y )',
            'Количество полюсов' => '2',
            'КПД, %' => '65',
            'Коэфициент мощности, COS φ' => '0,8',
            'Соотношение токов, Iп/Iн' => '5,5',
            'Соотношение крутящих моментов, Mп/ Mн' => '2,3',
            'Соотношение крутящих моментов, Mтах/ Mн' => '2,3',
            'Момент инерции, кг*м2' => '-',
            'Уровень шума, Дб' => '-',
            'Габаритные размеры, мм' => '204x156',
            'Высота вала, мм' => '56',
            'Масса, кг' => '4,5',
            'Класс энергоэффективности' => 'IE1',
            'Класс изоляции' => 'F',
            'Метод охлаждения' => 'IC411',
            'Класс защиты (пылевлагозащита)' => 'IP55',
            'Климатическое исполнение' => 'У1',
            'Цена, руб.' => '3 559,00',
            'Подшипник со стороны привода, DE' => '6201ZZ',
            'Подшипник со стороны привода, NDE' => '6201ZZ',
        ];

        $propertyValues = [];
        $i = 0;
        foreach ($properties as $title => $value) {
            $property = Property::factory()->create([
                'title' => $title,
                'active' => true,
                'show_in_category' => true,
                'sorting' => $i,
            ]);

            $propertyValues[$property->id] = ['value' => $value];

            ++$i;
        }

        $products = Product::query()->get();
        foreach ($products as $product) {
            $product->properties()->sync($propertyValues);
        }


    }
}
