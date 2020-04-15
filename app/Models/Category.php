<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string  $description
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @mixin \Eloquent
 */

class Category extends Model
{
    protected $fillable = ['slug','title','description'];
}
