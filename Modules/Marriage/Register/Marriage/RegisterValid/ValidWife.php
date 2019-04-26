<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyWife;

Use App\User;

trait ValidWife
{
    use VerifyWife;
    
    public function validateWife()
    {
        
        if($this->data['wife_email']){

            $this->birthAuth($this->wifeUser);
            $this->marriageAuth($this->wifeUser);
            $this->genderAuth($this->wifeUser);
        }
        $this->wifeMarriageDateAuth($this->wifeUser);

    }
}