<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest  extends FormRequest
{
    /**
     * Xác định xem người dùng có được ủy quyền thực hiện request này hay không.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Định nghĩa các validation rules cho request này.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'   => 'required|string|max:255',
            'avatar' => 'required|url', // Kiểm tra avatar phải là một URL hợp lệ
        ];
    }
}
