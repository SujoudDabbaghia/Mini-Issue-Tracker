<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\DueWindowCast;
use Illuminate\Support\Facades\DB;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'reporter_id', 'assignee_id',
        'title', 'code', 'status', 'priority', 'due_window'
    ];

    protected $casts = [
        'due_window' => DueWindowCast::class,
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor & Mutator
    |--------------------------------------------------------------------------
    */
    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = strtoupper($value);
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    /*
    |--------------------------------------------------------------------------
    | Local Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeUrgent($query)
    {
        return $query->where('priority', 'high');
    }

    /*
    |--------------------------------------------------------------------------
    | Helper: Transaction
    |--------------------------------------------------------------------------
    */
    public static function createWithRelations($data, $commentContent = null, $labels = [])
    {
        return DB::transaction(function () use ($data, $commentContent, $labels) {
            $issue = self::create($data);

            if ($commentContent) {
                $issue->comments()->create([
                    'user_id' => $data['reporter_id'],
                    'content' => $commentContent,
                ]);
            }

            if (!empty($labels)) {
                $issue->labels()->attach($labels);
            }

            return $issue;
        });
    }
}
