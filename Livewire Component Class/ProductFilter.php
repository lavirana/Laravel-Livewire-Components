<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DummyProduct;
use Livewire\WithPagination;

class ProductFilter extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['filters'];

    public array $filterOptions = [
        'prices' => ['0,25', '25,50', '50,100', '100,200', '200'],
        'colors' => ['blue', 'red', 'pink', 'yellow', 'orange', 'dark', 'green', 'purple', 'white'],
        'connection_type' => ['wired', 'wireless'],
        'brands' => ['sony', 'apple', 'bose', 'beats', 'panasonic', 'amazon-basics'],
        'types' => ['earbuds', 'earphones', 'overhead'],
        'ratings' => [4,3,2,1],
    ];

    public array $filters = array();

    public array $filtersToMerge = [
        'price' => [],
        'colors' => [],
        'type' => [],
        'connectionType' => [],
        'brand' => [],
        'rating' => []
    ];


    public $orderSelect;

    public $orderBy = [
        'key' => 'created_at',
        'direction' => 'desc'
    ];

    public function render()
    {
        return view('livewire.product-filter',[
            'products' => DummyProduct::filter($this->filters)->orderBy($this->orderBy['key'], $this->orderBy['direction'])->paginate(6),
        ]);
    }

    public function mount(){
        //Hack to merge query filters with all available filter selectors user can choose from.
        $this->filters = array_merge($this->filtersToMerge, $this->filters);
    }


    public function updated($name, $value){
        $this->resetPage();
    }

    public function updatedFiltersPrice($value){
        $this->filters['price'] = explode(',', $this->filters['price']);
    }

    public function updatedFiltersRating($value){
        $this->filters['rating'] = explode(',', $this->filters['rating']);
    }

    public function updatedOrderSelect($value){
        $this->orderBy = json_decode($this->orderSelect, true);
    }


    public function clearFilter($filterType){
        $this->filters[$filterType] = [];
    }


}
