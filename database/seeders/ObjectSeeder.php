<?php

namespace Database\Seeders;

use App\Models\ObjectModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objects = [
            [
                'title' => 'Обслуживание электродвигателей',
                'text' => 'Осуществляем ремонт и другое сервисное обсуживание электродвигателей АИР, АИС, АМН',
                'image' => 'assets/images/objects/i_object-1.jpg'
            ],
            [
                'title' => 'Производство двигателей в России',
                'text' => 'Производство основано на основе производственной базы Краснодарского завода',
                'image' => 'assets/images/objects/i_object-2.jpg'
            ],
            [
                'title' => 'Сервисный центр Nova Motor',
                'text' => 'Сервисный центр принимает в ремонт только электродвигатели Nova Motor',
                'image' => 'assets/images/objects/i_object-3.jpg'
            ],
            [
                'title' => 'Производство двигателей в России',
                'text' => 'Производство основано на основе производственной базы Краснодарского завода',
                'image' => 'assets/images/objects/i_object-4.jpg'
            ],
            [
                'title' => 'Обслуживание электродвигателей',
                'text' => 'Осуществляем ремонт и другое сервисное обсуживание электродвигателей АИР, АИС, АМН',
                'image' => 'assets/images/objects/i_object-5.jpg'
            ],
            [
                'title' => 'Сервисный центр Nova Motor',
                'text' => 'Сервисный центр принимает в ремонт только электродвигатели Nova Motor',
                'image' => 'assets/images/objects/i_object-6.jpg'
            ],
            [
                'title' => 'Обслуживание электродвигателей',
                'text' => 'Осуществляем ремонт и другое сервисное обсуживание электродвигателей АИР, АИС, АМН',
                'image' => 'assets/images/objects/i_object-7.jpg'
            ],
            [
                'title' => 'Производство двигателей в России',
                'text' => 'Производство основано на основе производственной базы Краснодарского завода',
                'image' => 'assets/images/objects/i_object-8.jpg'
            ],
            [
                'title' => 'Сервисный центр Nova Motor',
                'text' => 'Сервисный центр принимает в ремонт только электродвигатели Nova Motor',
                'image' => 'assets/images/objects/i_object-9.jpg'
            ],
        ];

        foreach($objects as $i => $object) {
            $image = Storage::drive('public')->putFile('objects', new File(public_path($object['image'])));

            ObjectModel::factory()->create([
                'title' => $object['title'],
                'text' => $object['text'],
                'image' => $image,
                'sorting' => $i,
                'active' => true,
            ]);
        }
    }
}
