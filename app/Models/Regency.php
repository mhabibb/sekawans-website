<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $timestamps = false;


    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function patients()
    {
        return $this->hasManyThrough(Patient::class, District::class);
    }
    public function scopeCount($query, $param = 'patient')
    {
        // dd($query);
        if ($param === 'status') {

            $query->withWhereHas('districts', function ($query) {
                $query->withOnly('patients')->withWhereHas('patients', function ($query) {
                    $query->withOnly('patientDetail')->withWhereHas('patientDetail', function ($query) {
                        $query->withOnly('patientStatus');
                    });
                })->withCount([
                    'patients',
                    'patients as sembuh' => function (Builder $query) {
                        $query->withOnly('patientDetail')->withWhereHas('patientDetail', function ($query) {
                            $query->withOnly('patientStatus')->where('patient_status_id', 1);
                        });
                    },
                    'patients as berobat' => function (Builder $query) {
                        $query->withOnly('patientDetail')->withWhereHas('patientDetail', function ($query) {
                            $query->withOnly('patientStatus')->where('patient_status_id', 2);
                        });
                    },
                    'patients as mangkir' => function (Builder $query) {
                        $query->withOnly('patientDetail')->withWhereHas('patientDetail', function ($query) {
                            $query->withOnly('patientStatus')->where('patient_status_id', 3);
                        });
                    },
                    'patients as ltfu' => function (Builder $query) {
                        $query->withOnly('patientDetail')->withWhereHas('patientDetail', function ($query) {
                            $query->withOnly('patientStatus')->where('patient_status_id', 4);
                        });
                    },
                    'patients as matek' => function (Builder $query) {
                        $query->withOnly('patientDetail')->withWhereHas('patientDetail', function ($query) {
                            $query->withOnly('patientStatus')->where('patient_status_id', 5);
                        });
                    },
                ]);
            });
        }
    }
}
