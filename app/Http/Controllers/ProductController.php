<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Exception;
use PDF;
use App\Events\Product\ProductDeleted;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
	    return view('backend.product.index');
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexService()
    {
        return view('backend.service.index');
    }

    public function recordsService()
    {
        return view('backend.service.records');
    }

    public function recordsProduct()
    {
        return view('backend.product.records');
    }

    public function create()
    {
        return view('backend.product.create-product');
    }

    public function list()
    {
        return view('backend.product.list-products');
    }

    public function edit(Product $product)
    {
    	if($product->isChildren() || !$product->isProduct()){
    		abort(401);
    	}

        $product->children()->update(['updated_at' => $product->updated_at]);
        $product->children()->update(['created_at' => $product->created_at]);
        
        return view('backend.product.edit-product', compact('product'));
    }

    public function advanced(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        return view('backend.product.advanced-product', compact('product'));
    }

    public function prices(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        return view('backend.product.prices-product', compact('product'));
    }

    public function pictures(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        return view('backend.product.pictures-product', compact('product'));
    }

    public function moveStock(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        return view('backend.product.move-stock-product', compact('product'));
    }

    public function deleteAttributes(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        return view('backend.product.delete-attributes-product', compact('product'));
    }

    public function consumption(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }
        return view('backend.product.consumption-product')
            ->withProduct($product);
    }

    public function consumption_filter(Product $product)
    {
        if(!$product->isChildren() || !$product->isProduct()){
            abort(401);
        }
        return view('backend.product.consumption-product-filter')
            ->withProduct($product);
    }

    public function clear_consumption(Product $product)
    {
        if($product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        $product->consumption()->delete();

        return view('backend.product.consumption-product')
            ->withProduct($product);
    }

    public function createCodes(Product $product)
    {
        $product->load('children');

        DB::beginTransaction();

        try {
            foreach ($product->children as $prod) {
                if($prod->size->short_name && $prod->color->short_name){
                    $prod->update(['code' => $product->code.optional($prod->color)->short_name.optional($prod->size)->short_name]);
                }
            }

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating codes.'));
        }

        DB::commit();

        return redirect()->back()->withFlashSuccess(__('Updated codes'));
    }

    public function large_qr(Product $product)
    {
        if(!$product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        $pdf = PDF::loadView('backend.product.ticket.large-qr',compact('product'))->setPaper([0, 0, 1385.98, 296.85], 'landscape');
        // ->setPaper('A8', 'portrait')

        return $pdf->stream();
        // return view('backend.order.ticket-order');
    }

    public function large_barcode(Product $product)
    {
        if(!$product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        $pdf = PDF::loadView('backend.product.ticket.large-barcode',compact('product'))->setPaper([0, 0, 1385.98, 296.85], 'landscape');
        // ->setPaper('A8', 'portrait')

        return $pdf->stream();
        // return view('backend.order.ticket-order');
    }

    public function short_barcode(Product $product)
    {
        if(!$product->isChildren() || !$product->isProduct()){
            abort(401);
        }

        $pdf = PDF::loadView('backend.product.ticket.short-barcode',compact('product'))->setPaper([0, 0, 320.98, 896.85], 'landscape');
        // ->setPaper('A8', 'portrait')

        return $pdf->stream();
        // return view('backend.order.ticket-order');
    }

    public function destroy(Product $product)
    {
        if($product->id){
            event(new ProductDeleted($product));
            $product->delete();
        }
        return redirect()->route('admin.product.index')->withFlashSuccess(__('The product was successfully deleted.'));
    }

	public function deleted()
	{
	    return view('backend.product.deleted');
	}

    public function deletedService()
    {
        return view('backend.service.deleted');
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Product::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function select2ServiceLoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = Product::select(['id', 'name'])->where('name', 'like', '%' . $search . '%')->whereType('false')->orderBy('name')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function select2LoadMoreGroup(Request $request)
    {
        $search = $request->get('search');
        $data = Product::with('children')->where('name', 'like', '%' . $search . '%')->orderBy('name')->paginate(5);
        return response()->json(['products' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }
}
