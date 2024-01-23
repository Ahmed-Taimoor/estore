<?php

namespace App\Livewire;

use App\Models\Catagory;
use App\Models\Product as ModelsProduct;
use App\Models\SubCatagory;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $selectedCategory;
    public $selectedSubcategory = '';

    #[Rule('required|min:4')]
    public $productName;

    #[Rule('required|min:4')]
    public $productDesc;

    #[Rule('required|numeric|min:4')]
    public $productPrice;
    public $subcategories;
    #[Rule('required|min:4')]
    public $updatedProductName;
    #[Rule('required|numeric|min:4')]

    public $updatedProductId;

    public $isChecked = false;
    public $slides;
    public $titleImage;

    public string $searchBook = "";
    public string $sCategoryProducts = "";

    public function render()
    {
        $products = $this->showProducts();

        return view('admin.content.product', [
            'categories' => Catagory::all(),
            'products' => $products,
        ]);
    }

    public function showProducts()
    {
        if (!empty($this->searchBook)) {

            $products = ModelsProduct::where('name', 'like', '%' . $this->searchBook . '%')->paginate(8);

            return $products;

        } elseif (!empty($this->sCategoryProducts)) {
            $category = Catagory::where('id', $this->sCategoryProducts)->first();
            $subcategories = $category->subCategories()->get();
            foreach ($subcategories as $subCat) {
                $subCatID[] = $subCat->id;
            }
            $products = ModelsProduct::whereIn('sub_catagory_id', $subCatID)->paginate(8);
            return $products;

        } else {
            $products = ModelsProduct::paginate(8);
            return $products;
        }
    }

    public function saveProduct()
    {
        $this->validate();
        $productName = $this->productName;
        $productDesc = $this->productDesc;
        $productPrice = $this->productPrice;
        $titleImagePath = $this->titleImage[0]->store('images');
        $slides = $this->slides;

        $subCategory = SubCatagory::find($this->selectedSubcategory);

        $product = $subCategory->products()->create([
            'name' => $productName,
            'description' => $productDesc,
            'price' => $productPrice,
        ]);

        $product->titleImage()->create([
            'path' => $titleImagePath
        ]);

        foreach ($slides as $slide) {
            $slidePath = $slide->store('public/images');
            $product->images()->create([
                'path' => $slidePath
            ]);
        }


        $this->reset();
        $this->dispatch('action-done', [
            'type' => 'success',
            'message' => 'Product Added Successfully!',
            'text' => 'It will list on table soon.'
        ]);

    }
    public function toogleProductsSection()
    {
        $this->isChecked = !$this->isChecked;

    }
    public function updatedSelectedCategory()
    {
        $this->selectedSubcategory = '';

        $this->subcategories = $this->selectedCategory ? Catagory::find($this->selectedCategory)->subcategories : collect([]);
    }

    public function productAction($id, $modalType)
    {
        $product = ModelsProduct::where('id', $id)->first();
        if ($product) {
            $this->updatedProductName = $product->name;
            $this->updatedProductId = $product->id;
            if ($modalType == 'edit') {
                $this->dispatch('openModal', ['modelName' => '#editModal']);

            }
            if ($modalType == 'delete') {
                $this->dispatch('openModal', ['modelName' => '#deleteModal']);

            }
        }

    }
    public function updateProduct()
    {

        $productName = $this->productName;
        $productDesc = $this->productDesc;
        $productPrice = $this->productPrice;


        $product = ModelsProduct::where('id', $this->updatedProductId)->first();
        if ($product) {
            $product->update([
                'name' => $productName,
                'description' => $productDesc,
                'price' => $productPrice,
            ]);

            $this->dispatch('action-done', [
                'type' => 'success',
                'message' => 'Product Updated Successfully!',
                'text' => 'It will list on table soon.'
            ]);
            $this->dispatch('close', ['modelName' => '#editModal']);
        }
        $this->productName = '';
        $this->productDesc = '';
        $this->productPrice = '';
        $this->updatedProductId = '';

    }
    public function deleteProduct()
    {
        $product = ModelsProduct::where('id', $this->updatedProductId)->first();
        if ($product) {
            $product->delete([
                'id' => $this->updatedProductId,
            ]);
            $this->dispatch('action-done', [
                'type' => 'success',
                'message' => 'Category Deleted Successfully!',
                'text' => 'It will be removed from table soon.'
            ]);
            $this->dispatch('close', ['modelName' => '#deleteModal']);

        }
    }

}