<?php

namespace App\Livewire;

use App\Enums\HomeProducts;
use App\Models\Product;
use Livewire\Component;

class HomeProduct extends Component
{
    public $fetaturedProducts;
    public $titleFeaturedProduct;
    public function render()
    {

        return view('admin.content.home-product', [
            'products' => Product::all(),
            'featuredProducts' => HomeProducts::getInstances(),
        ]);
    }
    public function addProducts()
    {
        $fetaturedProducts = $this->fetaturedProducts;

        foreach ($fetaturedProducts as $fetaturedProduct) {
            $pId = (int) $fetaturedProduct;

            $product = Product::find($pId);
            if ($product) {
                $product->homeProduct()->create(['type' => $this->titleFeaturedProduct]);
            }
        }
        $this->reset();
        $this->dispatch('action-done', [
            'type' => 'success',
            'message' => 'Product Added Successfully!',
            'text' => 'It will list on table soon.'
        ]);

    }
}