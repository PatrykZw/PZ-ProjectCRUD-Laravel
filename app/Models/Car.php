<?php

/**
 * @OA\Schema(
 *     schema="Car",
 *     title="Car",
 *     description="Model of a Car.",
 *     required={"id", "image_path", "make", "model", "body_shape", "fuel", "transmission", "engine", "engine_capacity", "status", "day_repayment", "rental_date", "return_date"},
 *     @OA\Property(property="id", type="integer", description="Car ID"),
 *     @OA\Property(property="image_path", type="string", description="Image path"),
 *     @OA\Property(property="make", type="string", enum={"Audi", "BMW", "Ford", "Jaguar", "Kia", "Land Rover", "Lexus", "Mercedes Benz", "MINI", "Nissan", "SEAT", "Skoda", "Toyota", "Vauxhall", "Volkswagen", "Volvo"}, description="Car make"),
 *     @OA\Property(property="model", type="string", description="Car model"),
 *     @OA\Property(property="body_shape", type="string", enum={"Combi", "Covertible", "Coupe", "Estate", "Hatchback", "MPV", "Saloon", "Sedan", "SUV"}, description="Body shape"),
 *     @OA\Property(property="fuel", type="string", enum={"Electric", "Hybrid", "Petrol", "Oil"}, description="Fuel type"),
 *     @OA\Property(property="transmission", type="string", enum={"Automatic", "Manual"}, description="Transmission type"),
 *     @OA\Property(property="engine", type="string", description="Engine type"),
 *     @OA\Property(property="engine_capacity", type="number", format="double", description="Engine capacity"),
 *     @OA\Property(property="status", type="string", enum={"Fabric", "Modified"}, description="Car status"),
 *     @OA\Property(property="day_repayment", type="number", format="double", description="Day repayment"),
 *     @OA\Property(property="rental_date", type="date", format="date", description="Rental date"),
 *     @OA\Property(property="return_date", type="date", format="date", description="Return date")
 * )
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'image_path',
        'make',
        'model',
        'body_shape',
        'fuel',
        'transmission',
        'engine',
        'engine_capacity',
        'status',
        'day_repayment',
        'rental_date',
        'return_date'
    ];
}