<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Description;
use App\Models\Price;

class MainController extends Controller
{
    public function index()
    {
        return view('product');
    }



    public function sort(){
        $data = DB::table('products');
        $dataCount = $data->count();
        $products = Product::sortable()
        ->join('descriptions', 'descriptionID', 'descriptions.id')
        ->join('prices', 'priceID', 'prices.id')
        ->paginate($dataCount);
        return view('product', ['data' => $data, 'products' => $products]);
    }



    public function search(){
        $search_text = $_GET['query'];
        $data = DB::table('products');
        $dataCount = $data->count();
        $products = Product::sortable()
        ->join('prices', 'priceID', 'prices.id')
        ->join('descriptions', 'descriptionID', 'descriptions.id')
        ->where('name', 'LIKE', '%' . $search_text . '%')
        ->orWhere('description', 'LIKE', '%' . $search_text . '%')
        ->orWhere('price', 'LIKE', '%' . $search_text . '%')
        ->paginate($dataCount);
        return view('product', ['products' => $products]);
    }



    public function addProductsList(){
        $descriptions = Description::get();
        $products = Product::get();
        $prices = Price::get();
        return view('add-product', ['descriptions' => $descriptions, 'prices' => $prices, 'products' => $products]);
    }



    public function addDescription(Request $req){
        $req->validate([
            'description' => ['required'],
        ],
        [
            'description.required' => 'To pole jest wymagane',
        ]);
        $description = $req->input('description');

        DB::table('descriptions')->insert(['description' => $description]);
        return redirect('/add-products');
    }



    public function editDescription(Request $req){
        $req->validate([
            'descriptionNew' => ['required'],
        ],
        [
            'descriptionNew.required' => 'To pole jest wymagane',
        ]);
        $description = $req->input('descriptionNew');
        $descriptionOld = $req->input('descriptionOld');

        DB::table('descriptions')
        ->where('id', $descriptionOld)
        ->update(['description' => $description]);
        return redirect('/add-products');
    }



    public function addPrice(Request $req){
        $req->validate([
            'price' => ['required', 'max:255', 'regex:/^\d+(\.\d{1,2})?$/'],
        ],
        [
            'price.required' => 'To pole jest wymagane',
            'price.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'price.regex' => 'Cena jest niepoprawna',
        ]);


        $price = $req->input('price');

        DB::table('prices')->insert(['price' => $price]);
        return redirect('/add-products');
    }



    public function editPrice(Request $req){
        $req->validate([
            'priceNew' => ['required', 'max:255', 'regex:/^\d+(\.\d{1,2})?$/'],
        ],
        [
            'priceNew.required' => 'To pole jest wymagane',
            'priceNew.max' => 'To pole może zawierać maksymalnie 255 znaków',
            'priceNew.regex' => 'Cena jest niepoprawna',
        ]);

        $price = $req->input('priceNew');
        $priceOld = $req->input('priceOld');

        DB::table('prices')
        ->where('id', $priceOld)
        ->update(['price' => $price]);
        return redirect('/add-products');
    }



    public function addProducts(Request $req){
        $req->validate([
            'productName' => ['required', 'max:255'],
        ],
        [
            'productName.required' => 'To pole jest wymagane',
            'productName.max' => 'To pole może zawierać maksymalnie 255 znaków',
        ]);


        $productName = $req->input('productName');
        $description = $req->input('description');
        $price = $req->input('price');

        DB::table('products')->insert(['name' => $productName, 'priceID' => $price, 'descriptionID' => $description]);
        return redirect('/add-products');
    }



    public function editProducts(Request $req){
        $req->validate([
            'productNameNew' => ['required', 'max:255'],
        ],
        [
            'productNameNew.required' => 'To pole jest wymagane',
            'productNameNew.max' => 'To pole może zawierać maksymalnie 255 znaków',
        ]);

        $productNameOld = $req->input('productNameOld');
        $productNameNew = $req->input('productNameNew');
        $descriptionNew = $req->input('descriptionNew');
        $priceNew = $req->input('priceNew');

        DB::table('products')
        ->where('id', $productNameOld)
        ->update(['name' => $productNameNew, 'descriptionID' => $descriptionNew, 'priceID' => $priceNew]);
        return redirect('/add-products');
    }



    public function deleteProducts(Request $req){
        $productNameOldDelete = $req->input('productNameOldDelete');

        DB::table('products')
        ->where('id', $productNameOldDelete)
        ->delete();
        return redirect('/add-products');
    }
}