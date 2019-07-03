<?php

namespace App\Jobs;

use App\Repositories\Contracts\LogDatabaseContract;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class WriteLogDatabaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string
     */
    private $action;
    /**
     * @var string
     */
    private $tableName;
    /**
     * @var string
     */
    private $before;
    /**
     * @var string
     */
    private $after;
    /**
     * @var int
     */
    private $userId;

    /**
     * Create a new job instance.
     * @param string $action
     * @param string $tableName
     * @param string $before
     * @param string $after
     * @param int    $userId
     */
    public function __construct(
        string $action,
        string $tableName,
        string $before,
        string $after,
        int $userId
    ) {

        $this->action    = $action;
        $this->tableName = $tableName;
        $this->before    = $before;
        $this->after     = $after;
        $this->userId    = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $log = app(LogDatabaseContract::class);
        $log->add([
            'action'     => $this->action,
            'table_name' => $this->tableName,
            'before'     => $this->before,
            'after'      => $this->after,
            'user_id'    => $this->userId
        ]);
    }
}
