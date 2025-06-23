<?php

namespace App\Console\Commands;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class import extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//
//        dd(3);
//        $photos = [
//            '/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/resources/1.jpeg',
//            '/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/resources/2.jpeg',
//            '/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/resources/3.jpeg',
//            '/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/resources/4.jpeg',
//            '/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/resources/5.jpeg',
//        ];
//
//        $products = Product::query()->where('id','!=',102)->get();
//        foreach($products as $product) {
//            foreach($photos as $photo) {
//                $product->addMedia($photo)->preservingOriginal()->toMediaCollection();
//            }
//        }
//
//        dd(1);
//
//
//
//
//
//
//        $files = ['АИР','АИС','АМН'];
//
//        $prices = [];
//
//        foreach ($files as $file) {
//            if (($handle = fopen(base_path().'/import/'.$file.".csv", "r")) !== FALSE) {
//                $row = 0;
//                while (($data = fgetcsv($handle, 10000, "|")) !== FALSE) {
//                    ++$row;
//                    if($row == 1) continue;
//
//                    $title = trim($data[0]);
//
//                    $prices[$title] = [
//                        'price' => (int)str_replace([',','.00'],'',trim($data[25])),
//                    ];
//                }
//
//                fclose($handle);
//            }
//        }
//
//        $products = Product::query()->get();
//        foreach($products as $product) {
//
//
//
//            /*if(isset($prices[$product->title])) {
//                $Offer = new Offer();
//                $Offer->product_id = $product->id;
//                $Offer->price = $prices[$product->title]['price'];
//                $Offer->active = true;
//                $Offer->sorting = 0;
//                $Offer->save();
//            }*/
//
//
//
//            /*$img = base_path().'/import/images/'.$product->title.'.png';
//            if(file_exists($img)) {
//                $image = Storage::drive('public')->putFile('products', new File($img));
//                $product->addMediaFromDisk($image,'public')->toMediaCollection();
//            }*/
//        }
    }
}
