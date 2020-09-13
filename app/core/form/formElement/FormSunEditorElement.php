<?php

namespace Form\FormElement;

use Form\FormException;

class FormSunEditorElement extends FormTextareaElement
{
    private $dependency;

    public function createElement(): string
    {
        parent::createElement();
        $this->addDependencyEditor();
        $this->configEditor();
        return $this->element = $this->element . $this->dependency;
    }

    private function addDependencyEditor()
    {
        $this->dependency = "<script src='" . STATIC_PATH . "/js/lib/suneditor.min.js'></script>";
        $this->dependency .= "<link rel='stylesheet' href='" . STATIC_PATH . "/css/lib/suneditor.min.css'>";
    }

    private function configEditor()
    {
        $name = $this->elementDetail["name"];
        $this->dependency .= <<<HTML
            <script>
                $(document).ready(function() {
                    
                    SUNEDITOR.create(document.querySelector('textarea[name="$name"]'), {
                        templates: [
        {
            name: 'Template-1',
            html: '<p>HTML source1</p>'
        },
        {
            name: 'Template-2',
            html: '<p>HTML source2</p>'
        }
    ],
                        buttonList: [
                            ['undo', 'redo'],
                            ['fontSize', 'formatBlock'],
                            [':p-More Paragraph-default.more_paragraph', 'font', 'fontSize', 'formatBlock', 'paragraphStyle', 'blockquote'],
                            ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
                            ['fontColor', 'hiliteColor', 'textStyle'],
                            ['removeFormat'],
                            ['outdent', 'indent'],
                            ['align', 'horizontalRule', 'list', 'lineHeight'],
                            ['fullScreen', 'showBlocks', 'codeView', 'print'],
                            
                           
                        ]
                    });
                })
            </script>
        
HTML;
    }
}