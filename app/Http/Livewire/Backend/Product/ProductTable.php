<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Backend\DataTable\WithBulkActions;
use App\Http\Livewire\Backend\DataTable\WithCachedRows;
use Carbon\Carbon;
use App\Events\Product\ProductRestored;

class ProductTable extends Component
{
	use Withpagination, WithBulkActions, WithCachedRows;

    protected $paginationTheme = 'bootstrap';

	protected $queryString = [
        'searchTerm' => ['except' => ''],
        'perPage',
    ];

    public $perPage = '12';

    public $status;
    public $searchTerm = '';

    protected $listeners = ['restore' => '$refresh'];

    public function getRowsQueryProperty()
    {
        $query = Product::query()
            ->onlyProducts()
            ->with('children', 'consumption')
            ->withCount('children')
            ->whereNull('parent_id')
            ->orderBy('updated_at', 'desc');

        if ($this->status === 'deleted') {
            return $query->onlyTrashed();
        }

        $this->applySearchFilter($query);

        return $query;
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->rowsQuery->paginate($this->perPage);
        });
    }

    private function applySearchFilter($products)
    {
        if ($this->searchTerm) {
            return $products->whereRaw("code LIKE \"%$this->searchTerm%\"")
                            ->orWhereRaw("name LIKE \"%$this->searchTerm%\"")
                            ->orWhereRaw("description LIKE \"%$this->searchTerm%\"")
                            ->onlyProducts();
        }

        return null;
    }

    public function clear()
    {
        $this->searchTerm = '';
        $this->resetPage();
        $this->perPage = '12';
    }

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function restore($id)
    {
        if($id){
            $restore_product = Product::withTrashed()
                ->where('id', $id)
                ->first();

            event(new ProductRestored($restore_product));

            $restore_product->restore();
        }

        $this->emit('swal:alert', [
            'icon' => 'success',
            'title'   => __('Restored'), 
        ]);
    }

    public function render()
    {
        return view('backend.product.table.product-table', [
            'products' => $this->rows,
        ]);
    }
}
