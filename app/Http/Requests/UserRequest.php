<?php 

namespace App\Http\Requests;

class UserRequest extends Request 
{

    /**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
	
    /**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'required|min:5|max:20|alpha',
			'email' => 'required|email',
			'password' => 'required|max:250'
		];
	}

}