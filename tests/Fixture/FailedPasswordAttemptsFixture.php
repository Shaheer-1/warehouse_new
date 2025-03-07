<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FailedPasswordAttemptsFixture
 */
class FailedPasswordAttemptsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 'e0e64542-9478-4092-86db-f0e690970eac',
                'user_id' => '2cbff523-5d7c-49e4-8028-3bd43dc5866b',
                'created' => '2025-02-10 18:52:05',
            ],
        ];
        parent::init();
    }
}
