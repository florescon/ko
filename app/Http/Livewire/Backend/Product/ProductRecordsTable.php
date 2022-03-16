<?php

namespace App\Http\Livewire\Backend\Product;

use App\Models\ProductOrder;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Backend\DataTable\WithBulkActions;
use App\Http\Livewire\Backend\DataTable\WithCachedRows;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\ProductsRecordsExport;
use Excel;

class ProductRecordsTable extends Component
{
    use Withpagination, WithBulkActions, WithCachedRows;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'searchTerm' => ['except' => ''],
        'perPage',
        'deleted' => ['except' => FALSE],
        'dateInput' => ['except' => ''],
        'dateOutput' => ['except' => '']
    ];

    public $perPage = '10';

    public $sortField = 'created_at';
    public $sortAsc = false;
    
    public $searchTerm = '';

    public $dateInput = '';
    public $dateOutput = '';

    public $created, $updated, $selected_id, $deleted;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }


    public function export()
    {
        return response()->streamDownload(function () {
            echo $this->selectedRowsQuery->toCsv();
        }, 'products-records-list.csv');
    }

    private function getSelectedRecords()
    {
        return $this->selectedRowsQuery->get()->pluck('id')->map(fn($id) => (string) $id)->toArray();
    }

    public function exportMaatwebsite($extension)
    {   
        abort_if(!in_array($extension, ['csv', 'xlsx', 'html', 'xls', 'tsv', 'ids', 'ods']), Response::HTTP_NOT_FOUND);
        return Excel::download(new ProductsRecordsExport($this->getSelectedRecords()), 'products-records-list.'.$extension);
    }

    public function getRowsQueryProperty()
    {
        return ProductOrder::query()->with('product.parent', 'parent_order.product')
            ->whereHas('product', function($q) {
                $q->where('type', true);
            })
            ->when($this->dateInput, function ($query) {
                empty($this->dateOutput) ?
                    $query->whereBetween('updated_at', [$this->dateInput.' 00:00:00', now()]) :
                    $query->whereBetween('updated_at', [$this->dateInput.' 00:00:00', $this->dateOutput.' 23:59:59']);
            })
            ->when(!$this->dateInput, function ($query) {
                $query->whereYear('created_at', now()->year);
            })
            ->where(function ($query) {
                $query->whereHas('product.parent', function($query) {
                    $query->whereRaw("name LIKE \"%$this->searchTerm%\"");
                })->orWhere('order_id', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('quantity', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('price', 'like', '%' . $this->searchTerm . '%');
            })
            ->when($this->deleted, function ($query) {
                $query->onlyTrashed();
            })
            ->when($this->sortField, function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
    }

    public function clearFilterDate()
    {
        $this->dateInput = '';
        $this->dateOutput = '';
    }

    public function clearAll()
    {
        $this->dateInput = '';
        $this->dateOutput = '';
        $this->searchTerm = '';
        $this->resetPage();
        $this->perPage = '10';
        $this->deleted = FALSE;
        $this->selectAll = false;
        $this->selectPage = false;
        $this->selected = [];
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->rowsQuery->paginate($this->perPage);
        });
    }

    public function render()
    {
        return view('backend.product.table.product-records-table', [
            'records' => $this->rows,
        ]);
    }
}
