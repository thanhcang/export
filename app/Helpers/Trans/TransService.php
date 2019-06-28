<?php


namespace App\Helpers\Trans;


use App\Repositories\Contracts\TransContact;

class TransService
{
    /**
     * @var TransContact
     */
    private $transContact;

    public function __construct(TransContact $transContact)
    {
        $this->transContact = $transContact;
    }

    public function add(array $data, bool $single = true)
    {
        if ($single) {
            $this->addSingle($data);
        }

        $this->addMultiple($data);
    }

    protected function addMultiple(array $data)
    {
        foreach ($data as $item) {
            $this->addSingle($item);
        }

    }

    protected function addSingle(array $data)
    {
        $this->transContact->add($data);
    }
}
