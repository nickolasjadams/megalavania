<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Brand;

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
        return view('brand-create');
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
        
        // check $categoryId to make sure it exists (add if it doesn't?)
        // if categoryId doesn't exist, throw err and give user feedback

        // if name is unique
        $isUniqueName = true; // probably want to call a function to check for unique name

        // add new brand
        if($isUniqueName)
        {
            Brand::create([
                'name' => $name,
                'category_id' => $categoryId
            ]);
        }
        
        // update brand_user table with user id and brand id
        // BrandUser::store();?

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
        return DB::table('brands')
            ->join('categories', 'categories.id', '=', 'brands.category_id')    
            ->join('brand_user', 'brand_user.brand_id', '=', 'brands.id')
            ->select('brands.name as bName', 'categories.name as cName')
            ->where('user_id', Auth::user()->id)
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
