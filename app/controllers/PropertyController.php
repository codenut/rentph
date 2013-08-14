<?php

class PropertyController extends BaseController {
  public function __construct() {
    $this->beforeFilter('auth', array('only' => array('getNew'))); 
  }

  public function getIndex() {
    return View::make('properties/index');
  }

  public function getResults() {
    $properties = Property::whereRaw("title LIKE '%" . Input::get('keyword') . "%'")->paginate(1);
    $properties->setBaseUrl('results');
    Log::info('Keyword: ' . json_encode(Input::all()) . json_encode($_GET));
    return View::make('properties/properties', array('properties' => $properties));
  }

  public function getNew() {
    return View::make('properties/new');
  }

  public function getShow($property_id) {
    $property = Property::find($property_id);
    Log::info("Property: " . $property);
    return View::make('properties/show', array('property' => $property)); 
  }

  public function postUpload($dir) {
    $input = Input::all();
    /*$rules = array(
      'file' => 'image|max:10000',
    );

    $validation = Validator::make($input, $rules);

    if($validation->fails()) {
      return Response::make($validation->errors->first(), 400); 
    }*/

    Log::info('$_FILES' . json_encode($_FILES)); 
    Log::info('Input::file("image"): ' . json_encode($input) . ' ' . Input::hasFile('image') . ' ');

    $file = $_FILES['file'];//Input::file('image');
    $directory = base_path() . '/data/' . $dir . '/';
    if(!is_dir($directory)) {
      mkdir($directory); 
    }
    $filename = $directory . sha1(time().time()) . '.' . File::extension($file['name']);

    //$upload_done = Input::upload('image', $directory, $filename);
    Log::info('File name: ' . $filename);
    $upload_done = move_uploaded_file($file['tmp_name'], $filename);

    if($upload_done) {
      return Response::make('success', 200); 
    } else {
      return Response::make('error', 400);   
    }

  }

  public function postCreate() {
    $input = Input::all();        
    $input['user_id'] = Auth::user()->id;
    $validator = Property::validates($input);
    Log::info('Property save: ' . json_encode($input));
    if($validator->fails()) {
      return array('result' => 'error', 'message' => ($validator->messages()->toArray())); 
    } else {
      $directory = base_path() . '/data/' . $input['image_dir'];
      if (!is_dir($directory)) {
        return array('result' => 'error', 'message' => array('image_dir' => 'Please upload an image of your property.')); 
      } else {
        $property = Property::create($input);    
        Log::info('Property created: ' . json_encode($property) . ' id = ' . $property->id);
        foreach (scandir($directory) as $image) {
          if(strlen($image) > 2) {
            (new Image(array('file_name' => $image, 'property_id' => $property->id)))->save();
          }
        }
        return array('result' => 'success', 'id' => $property->id);
      }
    }

  }

  public function getImage($property_id, $index) {
    $property = Property::find($property_id); 
    $file = base_path() . '/data/' . $property->image_dir . '/' . $property->images[$index]->file_name;
    return Response::download($file, 200, array('content-type' => 'image/png'));
  }

}  

