<?php
namespace Source\App\Core;

use League\Plates\Engine;

class Controller
{
    private $templates;
    protected function sanitizeData($data, $fillableFields) {
        $sanitizedData = [];
    
        foreach ($fillableFields as $field) {
            if (isset($data[$field])) {
                $sanitizedData[$field] = trim(filter_var($data[$field], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            }
        }
    
        return $sanitizedData;
    }

    public function render($templateName, $data) {
        $this->templates = new Engine();
        $this->templates->setDirectory(__DIR__ . "/../../../views");
        $template = $this->templates->make($templateName, $data);
        return $template->render();
    }
}

?>