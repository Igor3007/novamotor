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
        dd(1);
        $sort = -2;

        $products = Product::query()->get()->keyBy('title')->all();

        $file = storage_path('app/air.csv');
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 3000, "|")) !== FALSE) {
                ++$sort;

                if($sort < 0) continue;

                $products[$data[0]]->update(['sorting' => $sort]);




            }
            fclose($handle);
        }

        dd(file_exists($file));


        $files = scandir('/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/b');
        foreach($files as $file) {
            if(in_array($file,['.','..'])) continue;

            $pathinfo = pathinfo($file);

            $name = $pathinfo['filename'];

            $products = Product::query()->with('images')->where('title','LIKE','%'.$name.'%')->get();
            if(!$products->count()) {
                dump($file);
            }
            else{
                foreach($products as $product) {

                    $image = Storage::drive('public')->putFile('photos/products', new File($product->images->last()->getPath()));

                    $product->sizes = '<p><img src="/storage/'.$image.'"></p>';
                    $product->save();


                    /*if($product->images->count() == 7) {
                        $product->images[5]->delete();
                    }*/


                    //$product->addMedia('/var/www/brodeks_dev__usr/data/www/nova-motors-back.promicom.xyz/b/'.$file)->preservingOriginal()->toMediaCollection();
                }
            }


        }

        dd(1);

        /*$products = Product::query()->with('images')->get();
        foreach($products as $product) {
            if(isset($product->images[5])) {
                $image = Storage::drive('public')->putFile('photos/products', new File($product->images[5]->getPath()));

                $product->sizes = '<p><img src="/storage/'.$image.'"></p>';
                $product->save();
            }
        }


        dd(1);*/
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
