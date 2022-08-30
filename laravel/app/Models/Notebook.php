<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *   schema="Notebooks",
 *   title="Notebooks",
 *   @OA\Property(type="integer",description="id of Notebook",title="id",property="id",example="1",readOnly="true"),
 *   @OA\Property(type="string",description="name of Notebook",title="full_name",property="name",example="Мишин Эрик Сергеевич"),
 *   @OA\Property(type="string",description="company name of Notebook",title="company",property="company",example="ЗАО БашкирФлот"),
 *   @OA\Property(type="string",description="tel of Notebook",title="tel",property="tel",example="(35222) 18-6675"),
 *   @OA\Property(type="string",description="email of Notebook",title="email",property="email",example="klazarev@kudrysov.com"),
 *   @OA\Property(type="data",description="date_birth of Notebook",title="date_birth",property="date_birth",example="2001-04-15"),
 *   @OA\Property(type="string",description="photo of Notebook",title="photo",property="photo",example="https://via.placeholder.com/640x480.png/0000cc?text=at"),
 * )
 *
 * @OA\Parameter(
 *      parameter="Notebook--id",
 *      in="path",
 *      name="id",
 *      required=true,
 *      description="Id of Notebook",
 *      @OA\Schema(
 *          type="integer",
 *          example="130",
 *      )
 * ),
 */
class Notebook extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'company',
        'tel',
        'email',
        'date_birth',
        'photo',
    ];
}
