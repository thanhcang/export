<?php


namespace App\Repositories\Conditions;


use App\Traits\Condition;

trait LeadCondition
{
    use Condition;

    protected function paginateCondition(array $inputs, array $customize = [])
    {
        $condition = [];

        if ($this->exists('name', $inputs)) {
            $condition[] = $this->leadForName($this->getValue('name', $inputs));
        }

        if ($this->exists('company', $inputs)) {
            $condition[] = $this->leadForCompany($this->getValue('company', $inputs));
        }

        if ($this->exists('whatsapp', $inputs)) {
            $condition[] = $this->leadForWhatsApp($this->getValue('whatsapp', $inputs));
        }

        if ($this->exists('linked', $inputs)) {
            $condition[] = $this->leadForLinked($this->getValue('linked', $inputs));
        }

        if ($this->exists('source', $inputs)) {
            $condition[] = $this->leadForSource($this->getValue('source', $inputs));
        }

        if ($this->exists('address', $inputs)) {
            $condition[] = $this->leadForAddress($this->getValue('address', $inputs));
        }

        return array_merge_recursive($condition, $customize);
    }

    protected function leadForName(string $name)
    {
        return ['leads.full_name', 'like', '%' . $name . '%'];
    }

    protected function leadForPhone(string $phone)
    {
        return ['leads.phone', 'like', '%' . $phone . '%'];
    }

    protected function leadForEmail(string $email)
    {
        return ['leads.phone', 'like', '%' . $email . '%'];
    }

    protected function leadForWhatsApp(string $name)
    {
        return ['leads.whatsapp', 'like', '%' . $name . '%'];
    }

    protected function leadForLinked(string $name)
    {
        return ['leads.linked', 'like', '%' . $name . '%'];
    }

    protected function leadForSource(string $name)
    {
        return ['leads.source', 'like', '%' . $name . '%'];
    }

    protected function leadForCompany(string $company)
    {
        return ['leads.company', 'like', '%' . $company . '%'];
    }

    protected function leadForAddress(string $address)
    {
        return ['leads.address', 'like', '%' . $address . '%'];
    }
}
