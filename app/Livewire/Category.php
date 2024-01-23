<?php

namespace App\Livewire;

use App\Models\Catagory;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Category extends Component
{

    #[Rule('required|min:4')]
    public $catagoryname;
    public $updatedCatagoryName;
    public $updatedCatagoryId;

    public function addCategory()
    {
        $this->validate();
        $catagoryname = $this->catagoryname;


        Catagory::create([
            'name' => $this->catagoryname,
        ]);
        $this->reset('catagoryname');

        $this->dispatch('category-created', [
            'type' => 'success',
            'message' => 'Category Created Successfully!',
            'text' => 'It will list on table soon.'
        ]);
    }
    public function render()
    {
        $categoryName = Catagory::all();

        return view('admin.content.category', [
            'category' => $categoryName,
        ]);
    }
    public function categoryAction($id, $modalType)
    {
        $category = Catagory::where('id', $id)->first();
        if ($category) {
            $this->updatedCatagoryName = $category->name;
            $this->updatedCatagoryId = $category->id;
            if ($modalType == 'edit') {
                $this->dispatch('openModal', ['modelName' => '#editModal']);
            }
            if ($modalType == 'delete') {
                $this->dispatch('openModal', ['modelName' => '#deleteModal']);
            }
        }
    }
    public function updateCategory()
    {
        $category = Catagory::where('id', $this->updatedCatagoryId)->first();
        if ($category) {
            $category->update([
                'name' => $this->updatedCatagoryName,
            ]);
            $this->dispatch('category-created', [
                'type' => 'success',
                'message' => 'Category Updated Successfully!',
                'text' => 'It will list on table soon.'
            ]);
            $this->dispatch('close', ['modelName' => '#editModal']);
        }
        $this->updatedCatagoryName = '';
        $this->updatedCatagoryId = '';
    }
    public function deleteCategory()
    {
        $category = Catagory::where('id', $this->updatedCatagoryId)->first();
        if ($category) {
            $category->delete([
                'id' => $this->updatedCatagoryId,
            ]);
            $this->dispatch('category-created', [
                'type' => 'success',
                'message' => 'Category Deleted Successfully!',
                'text' => 'It will be removed from table soon.'
            ]);
            $this->dispatch('close', ['modelName' => '#deleteModal']);
        }
    }
}