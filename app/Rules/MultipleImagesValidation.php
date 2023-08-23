<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MultipleImagesValidation implements Rule
{
    public function passes($attribute, $value)
    {
        foreach ($value as $file) {
            // Perform validation checks on $file
            // For example, you can check file size, allowed extensions, etc.

            // Example checks:
            // Check file size (in bytes)
            if ($file->getSize() > 5000000) { // 5MB
                return false; // Validation fails
            }

            // Check allowed extensions
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = strtolower($file->getClientOriginalExtension());
            if (!in_array($extension, $allowedExtensions)) {
                return false; // Validation fails
            }
        }

        return true; // All files passed validation
    }

    public function message()
    {
        return 'Validation failed for the uploaded images array.';
    }
}
