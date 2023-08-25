<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MultipleImagesValidation implements Rule
{
    protected $failedExtension = false;
    protected $failedSize = false;

    public function passes($attribute, $value)
    {
        foreach ($value as $file) {
            // Perform validation checks on $file
            // For example, you can check file size, allowed extensions, etc.

            // Example checks:
            // Check file size (in bytes)
            if ($file->getSize() > 5000000) { // 5MB
                $this->failedSize = true; // Mark size validation as failed
            }

            // Check allowed extensions
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            $extension = strtolower($file->getClientOriginalExtension());
            if (!in_array($extension, $allowedExtensions)) {
                $this->failedExtension = true; // Mark extension validation as failed
            }
        }

        return !$this->failedSize && !$this->failedExtension; // All files passed validation
    }

    public function message()
    {
        if ($this->failedSize && $this->failedExtension) {
            return 'Images have invalid extensions and exceed the file size limit.';
        } elseif ($this->failedSize) {
            return 'One or more images exceed the file size limit.';
        } elseif ($this->failedExtension) {
            return 'One or more images have invalid extensions.';
        }

        return 'Validation failed for the uploaded images array.';
    }
}
