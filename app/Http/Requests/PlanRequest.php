<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PlanRequest extends Request {

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
			'topic' => 'required|string',
            'app_url' => 'required_if:app_url,url|url',
            'app_title' => 'required_with:app_url|string',
            'app_description' => 'required_with:app_url|max:600',
            'app_image' => 'required_with:app_url|url',
            'ebook_url' => 'required_if:ebook_url,url|url',
            'ebook_title' => 'required_with:ebook_url|string',
            'ebook_description' => 'required_with:ebook_url|string|max:600',
            'ebook_image' => 'required_with:ebook_url|url',
            'video_url' => 'required_if:video_url,url|url',
            'video_title' => 'required_with:video_url|string',
            'video_description' => 'required_with:video_url|string|max:600',
            'video_image' => 'required_with:video_url|url',
            'how_to_use' => 'required'
		];
	}

}
