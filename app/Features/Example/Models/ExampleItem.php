<?php

declare(strict_types=1);

namespace App\Features\Example\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $status
 */
class ExampleItem extends Model
{
    protected $table = 'example_items';

    /** @var list<string> */
    protected $fillable = [
        'title',
        'description',
        'status',
    ];
}
