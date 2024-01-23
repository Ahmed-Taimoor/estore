<?php

namespace App\Livewire;

use App\Models\Catagory;
use App\Models\SubCatagory as ModelsSubCatagory;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class SubCatagory extends Component
{

    #[Rule('required|min:1')]
    public $categeryname = [];

    #[Rule('required|min:1')]
    public $selectedCategory;
    public $updatedSubcatagoryName;
    public $updatedSubcatagoryId;


    public function render()
    {
        $category = Catagory::all();

        return view('admin.content.sub-catagory', [
            'category' => $category
        ]);
    }
    public function submit()
    {

        $category = Catagory::find($this->selectedCategory);

        if (!$category) {
            return;
        }

        if (!isEmpty($this->categeryname)) {
            foreach ($this->categeryname as $key => $value) {
                $category->subCategories()->create(['name' => $value]);
            }
            $this->reset();

            $this->dispatch('action-done', [
                'type' => 'success',
                'message' => 'Subcategory Created Successfully!',
                'text' => 'It will list on table soon.'
            ]);
        }

    }
    public function categoryAction($id, $modalType)
    {
        $subCategory = ModelsSubCatagory::where('id', $id)->first();
        if ($subCategory) {
            $this->updatedSubcatagoryName = $subCategory->name;
            $this->updatedSubcatagoryId = $subCategory->id;
            if ($modalType == 'edit') {
                $this->dispatch('openModal', ['modelName' => '#editModal']);

            }
            if ($modalType == 'delete') {
                $this->dispatch('openModal', ['modelName' => '#deleteModal']);

            }
        }

    }
    public function updateSubcategory()
    {
        $subCategory = ModelsSubCatagory::where('id', $this->updatedSubcatagoryId)->first();
        if ($subCategory) {
            $subCategory->update([
                'name' => $this->updatedSubcatagoryName,
            ]);
            $this->dispatch('action-done', [
                'type' => 'success',
                'message' => 'Subcategory Updated Successfully!',
                'text' => 'It will list on table soon.'
            ]);
            $this->dispatch('close', ['modelName' => '#editModal']);
        }
        $this->updatedSubcatagoryName = '';
        $this->updatedSubcatagoryId = '';
    }
    public function deleteSubcategory()
    {
        $subCategory = ModelsSubCatagory::where('id', $this->updatedSubcatagoryId)->first();
        if ($subCategory) {
            $subCategory->delete([
                'id' => $this->updatedSubcatagoryId,
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