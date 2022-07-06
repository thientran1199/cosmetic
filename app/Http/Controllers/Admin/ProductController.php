<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    use StorageImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            //Insert data to product
            $dataFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            // dd($data);
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->promotion_price = $request->promotion_price;
            $product->content = $request->content;
            $product->user_id = auth()->id();
            $product->category_id = $request->category_id;
            $product->feature_image_name = $dataFeatureImage['file_name'];
            $product->feature_image_path = $dataFeatureImage['file_path'];
            // dd($product);
            $product->save();
            //end Insert data product

            // Insert data to ProductImage
            if ($request->hasFile('image_path')) {

                foreach ($request->image_path as $fieldItem) {
                    $dataProductImageDetail = $this->storageTraitUploadultipe($request, $fieldItem, 'product-images/' . $product->id);
                    $product_image = new ProductImage();
                    $product_image->product_id = $product->id;
                    $product_image->image_name = $dataProductImageDetail['file_name'];
                    $product_image->image_path = $dataProductImageDetail['file_path'];
                    $product_image->save();
                }
            }
            //end Insert data productImage
            //Insert Tags for Product
            foreach ($request->tags as $tagItem) {
                //insert tags
                $tag = Tag::firstOrCreate([
                    'name' => $tagItem
                ]);
                //insert product Tags
                $tagsID[] = $tag->id;
            }
            $product->tags()->attach($tagsID);
            DB::commit();

            Alert::success('Succes', 'ADD Product - ProductImage - Tags - ProductTag Success');
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'line:' . $e->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::where('parent_id',0)->pluck('name','id')->all();
        // $product = Product::find($id);
        $edit_cate = Category::find($product->category_id);
        // return view('admin.product.edit',compact('product','categories','edit_cate'));
        return view('admin.product.edit', compact('product','categories', 'edit_cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //

        try {
            DB::beginTransaction();
            //Insert data to product
            $dataFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            // dd($data);
            
            $product =  Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->promotion_price = $request->promotion_price;
            $product->content = $request->content;
            $product->user_id = auth()->id();
            $product->category_id = $request->category_id;
            $product->feature_image_name = $dataFeatureImage['file_name'];
            $product->feature_image_path = $dataFeatureImage['file_path'];
            // File::delete($$product);
            // dd($product);
            $product->update();
            //end Insert data product
            
            // Insert data to ProductImage
            if ($request->hasFile('image_path')) {
                $product_image = ProductImage::where('product_id',$id)->delete();
                foreach ($request->image_path as $fieldItem) {
                    $dataProductImageDetail = $this->storageTraitUploadultipe($request, $fieldItem, 'product-images/' . $product->id);
                //    File::delete($product_image);
                
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                      
                    ]);
                
                }
            }
            //end Insert data productImage
            //Insert Tags for Product
            foreach ($request->tags as $tagItem) {
                //insert tags
                $tag = Tag::firstOrCreate([
                    'name' => $tagItem
                ]);
                //insert product Tags
                $tagsID[] = $tag->id;
            }
            $product->tags()->sync($tagsID);
            DB::commit();

            Alert::success('Succes', 'EDIT Product - ProductImage - Tags - ProductTag Success');
            return redirect()->back();
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            Log::error("message" . $e->getMessage() . 'line:' . $e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Product::find($id)->delete();
        Alert::success('Success', 'Delete Product Done');
        return redirect()->back();
    }
}
