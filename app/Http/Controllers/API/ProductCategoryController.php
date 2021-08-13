<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function all(Request $req)
    {
        $id = $req->input('id');
        $limit = $req->input('limit');
        $name = $req->input('name');
        $show_product = $req->input('show_product');

        if ($id) {
            $category = ProductCategory::with(['products'])->find($id);

            if ($category) {
                return ResponseFormatter::success(
                    $category,
                    'Data Kategori berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data Kategori tidak ada',
                    404
                );
            }
        }

        $category = ProductCategory::query();

        if ($name) {
            $category->where('name', 'like', '%' . $name . '%');
        }

        if ($show_product) {
            $category->with('products');
        }

        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data List kategori berhasil diambil'
        );
    }
}
