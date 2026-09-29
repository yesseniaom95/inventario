<?php

namespace App\Services;

use App\Models\Product;
use PhpParser\Node\Expr\PreDec;

class ProductService 
{
    public function listProducts(){
        return Product::all();
    }

    public function createProduct( array $data){
        $product = Product::create([
            'name'          => $data['name'],
            'description'   => $data['description'],
            'price'         => $data['price'],
            'stock'         => $data['stock'],
            'category_id'   => $data['category_id']
        ]);

        return $product;
    }

    public function productDetails(string $product_id)
    {
        return  Product::findOrFail($product_id);

    }
    public function updateProduct(array $data, string $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->update($data);

        return $product;
    }
}

?>