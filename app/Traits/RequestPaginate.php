<?php


namespace App\Traits;


trait RequestPaginate
{
    protected $paginateLimit = 10;

    protected function requestPageNumber(): void
    {
        $page = request()->get('page', 1) <= 1 ? 1 : request()->get('page');
        request()->merge(['page' => $page]);
    }

    protected function requestRecordOfPage(): void
    {
        $limit = request()->get('limit', $this->paginateLimit);
        request()->merge(['limit' => $limit]);
    }

    protected function requestOffset(): void
    {
        $offset = request()->get('limit') * intval(request()->get('page') - 1);
        request()->merge(['offset' => $offset]);
    }

    protected function paginateHandle()
    {
        $this->requestPageNumber();
        $this->requestRecordOfPage();
        $this->requestOffset();
    }
}
