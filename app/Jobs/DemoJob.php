<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DemoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    //En cas de suppression du model, la tâche sera supprimé pour empêcher les erreurs
    public $deleteWhenMissingModels = true;

    // private Property $property;

    /**
     * Create a new job instance.
     */
    public function __construct(private Property $property)
    {
        //
        // $this->property = $property -> withoutRelations();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $property = $this->property->refresh();
        $this->property->title;
    }
}
