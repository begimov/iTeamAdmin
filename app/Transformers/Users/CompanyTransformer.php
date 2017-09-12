<?php

namespace App\Transformers\Users;

use App\Models\Users\Company;

class CompanyTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Company $company)
    {
        return [
            'id' => $company->id,
            'name' => $company->name,
        ];
    }
}
