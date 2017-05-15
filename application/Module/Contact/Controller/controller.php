<?php

namespace Module\Contact;

/**
 * Class Controller
 * @package Module\Contact
 */
class Controller extends \Core\Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addRoute('contact', 'inxed');
    }
}
