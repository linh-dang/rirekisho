<?php

namespace app;

use Illuminate\Database\Eloquent\Model;
use App\CV;

class Skill extends Model
{
    protected $table = 'it_skill';
    protected $fillable = [
        'name', 'study_time', 'skill_type', 'work_time',
    ];
    protected $hidden = [
        'cv_id'
    ];

    public function CV()
    {
        return $this->belongsTo('App\CV', 'cv_id');
    }

    // chưa dùng đến
    public function scopeOfType($query, $type)
    {
        return $query->where('skill_type', $type);
    }

    public function getRole()
    {
        $type = $this->skill_type;
        switch ($type) {
            case 0:
                $Role = "Language";
                break;
            case 1:
                $Role = "ProgLang";
                break;
            case 2:
                $Role = "VerMan";
                break;
            case 3:
                $Role = "Framework";
                break;
            case 4:
                $Role = "Database";
                break;
            default:
                $Role = $type;
                break;
        }
        return $Role;
    }
}
