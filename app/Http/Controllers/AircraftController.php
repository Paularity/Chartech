<?php

namespace App\Http\Controllers;


use App\Aircraft;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use View;
use Image;
use Auth;

class AircraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
            $this->middleware('auth');
     }

    public function index()
    {
                // get all the nerds
          $aircraft = Aircraft::all();
          $aircraft = Aircraft::paginate(5);
          // load the view and pass the nerds
          return View::make('aircraft.index')
            ->with('aircraft', $aircraft);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('aircraft.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                // validate
          // read more on validation at http://laravel.com/docs/validation
          $rules = array(
            'name'       => 'required|unique:aircrafts',
            'product_code'       => 'required|unique:aircrafts',
            'price'      => 'required|numeric',
            'quantity' => 'required|numeric',

          );
          $validator = Validator::make(Input::all(), $rules);

          // process the login
          if ($validator->fails()) {
            return Redirect::to('aircraft/create')
                ->withErrors($validator);
          } else {
            // store
            $aircraft = new Aircraft;
            $aircraft->product_code  = Input::get('product_code');
            $aircraft->name       = Input::get('name');
            $aircraft->price      = Input::get('price');
            $aircraft->quantity = Input::get('quantity');
            $aircraft->description = Input::get('description');

            $image = Input::file('image');
            if($image != "")
            {
              $filename  = time() . '.' . $image->getClientOriginalExtension();
              $path = public_path('uploads/' . $filename);
              Image::make($image->getRealPath())->save($path);
              $aircraft->image = $filename;
            }
            else {
              $aircraft->image = "no-image-available.svg";
            }

             $aircraft->save();

            // redirect
            Session::flash('message', 'Successfully created aircraft!');
            return Redirect::to('aircraft');
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
      // get the $aircraft
      $aircraft = Aircraft::findOrFail($id);

      // show the view and pass the $aircraft to it
      return View::make('aircraft.show')
          ->with('aircraft', $aircraft);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            // get the nerd
      $aircraft = Aircraft::find($id);

      // show the edit form and pass the nerd
      return View::make('aircraft.edit')
        ->with('aircraft', $aircraft);
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

                  // validate
            // read more on validation at http://laravel.com/docs/validation
            $rules = array(
              'name'       => 'required',
              'product_code'       => 'required',
              'price'      => 'required|numeric',
              'quantity' => 'required|numeric'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
              return Redirect::to('aircraft/'.$id.'/edit')
                  ->withErrors($validator);
            } else {
              // store
              $aircraft = Aircraft::find($id);
              $aircraft->name       = Input::get('name');
              $aircraft->product_code  = Input::get('product_code');
              $aircraft->price      = Input::get('price');
              $aircraft->quantity = Input::get('quantity');
              $aircraft->description = Input::get('description');
              if ($request->has('image')){
                $image = Input::file('image');
                $filename  = time() . '.' . $image->getClientOriginalExtension();
                $path = public_path('uploads/' . $filename);
                Image::make($image->getRealPath())->save($path);
                $aircraft->image = $filename;
              }
              else {
                $aircraft->image = Input::get('last-image');
              }

              $aircraft->save();

              // redirect
              Session::flash('message', 'Successfully updated aircraft!');
              return Redirect::to('aircraft/'.$id);
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
      // delete
        $aircraft = Aircraft::find($id);
        $aircraft->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the aircraft!');
        return Redirect::to('aircraft');
    }
}
