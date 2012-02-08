<?php

namespace Jme\Symfony\Component\Form;

use Symfony\Component\Form\Form,
    Symfony\Component\Translation\Translator;

class FormHandler
{
    /**
     * @var Form
     */
    private $form;
    
    /**
     * @var Translator
     */
    private $translator;
    
    /**
     * @param Form $form
     * @param Translator $translator 
     */
    public function __construct(Form $form, Translator $translator)
    {
        $this->form         = $form;
        $this->translator   = $translator;
    }
    
    /**
     * @return array
     */
    public function getErrors()
    {
        $errorMessages = array();
        
        foreach($this->form->getChildren() as $name => $child)
        {
            $errors = $child->getErrors(); 

            foreach($errors as $error)
            {
                $errorMessages[$name][] = $this->translator->trans($error->getMessageTemplate(), $error->getMessageParameters() );
            }
        }
        
        return $errorMessages;
    }
}