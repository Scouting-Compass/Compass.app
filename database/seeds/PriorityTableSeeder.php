<?php

use Illuminate\Database\Seeder;
use Compass\Models\Priority;

/**
 * Class PriorityTableSeeder
 */
class PriorityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  Priority $priorities The resource model from the helpdesk priorities storage. 
     * @return void
     */
    public function run(Priority $priorities): void
    {
        foreach ($priorities->getDefaultPriorities() as $priority) {
            $findAttributes = ['name' => $priority['name']];
            $createAttributes = ['color' => $priority['color'], 'type' => $priority['type'], 'name' => $priority['name']];

            $priorities->firstOrCreate($findAttributes, $createAttributes);
        }
    }
}
