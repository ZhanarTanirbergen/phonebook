<?php namespace App\Http\Controllers;

use App\Phone;
use Validator;
use DB;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PhonesController extends Controller
{
    
    public function index()
    {
        $phones = $this->respondWithData(Phone::get()->toArray());
        $phones = Phone::paginate(1);
        return $phones;                                                      
    }
    
    public function create()
    {
        $rules = [
            'first-name' => 'required',
            'last-name' => 'required',
            'phone' => 'required',
        ];

        $input = $_POST;

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $this->respondWithFailedValidation($validator);
        }

        $phone = new Phone;
        $phone->first_name = $input['first-name'];
        $phone->last_name = $input['last-name'];
        $phone->phone = $input['phone'];
        $phone->save();

        return $this->read($phone->id);
    }

    public function read($id)
    {
        $phones = $this->respondWithData(Phone::find($id));
    }

    public function update($id)
    {
        $rules = [
            'first-name' => 'required',
            'last-name' => 'required',
            'phone' => 'required',
        ];

        $input = $_POST;

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $this->respondWithFailedValidation($validator);
        }
        
        $phone = Phone::find($id);
        $phone->first_name = $input['first-name'];
        $phone->last_name = $input['last-name'];
        $phone->phone = $input['phone'];
        $phone->save();

        return $this->read($phone->id);
    }

    public function delete($id) {
        
        Phone::find($id)->forceDelete();
    }

    public function search($search) {
        return $this->respondWithData(Phone::where('first_name', 'LIKE', '%'.$search.'%')->get()->toArray());
        // $phones = Phone::paginate(1);
        // return $phones;
    }

    public function orderBy($str) {
        return $this->respondWithData(Phone::orderBy('created_at', $str)->get()->toArray());
    }
}
