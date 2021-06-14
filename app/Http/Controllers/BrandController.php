<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandUser;
use App\Models\Category;
use App\Models\User;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = $this->getBrandsByCurrentUser();

        return view('brands', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()
        ->sortBy('name');

        return view('brand-create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name = $request->get('name');
        $categoryId = $request->get('category_id');

        // if categoryId doesn't exist, throw err and give user feedback

        $category = Category::find($categoryId);
        if(!$category)
        {
            //throw error
            dd('temp error : category doesn\'t exist, please contact support to request it is added');
        }


        // find brand
        $brand = Brand::where('name', $name)
        ->where($categoryId, 'category_id')
        ->first();

        // add new brand if doesn't exist
        if(!$brand)
        {

            $brand = new Brand([
                'name' => $name,
                'category_id' => $categoryId
            ]);

        }

        //not sure if there is a better way to do this?
        $user = User::find(auth()->id());
        if(BrandUser::checkRecordExists($user->id, $brand->id))
        {
            dd('return record exists notification');

        }


        $user->brands()->save($brand);
        return redirect('/dashboard/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }

    // private functions

    /**
     * Retrieve brands information for current user
     * To get brands name column it's alias is "bName" and categories is "cName"
     *
     */

    private function getBrandsByCurrentUser()
    {
        return Brand::whereHas('users', function($query) {
            $query->where('users.id', auth()->id());
        })
        ->with('category')
        ->get();
    }

    /**
     * Retrieve all brands with attached users
     *
     *
     */

    private function getAllBrandsWithAssignedUsers()
    {
        return Brand::with('users')->get();
    }
}
