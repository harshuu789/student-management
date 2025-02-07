<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition()
    {
        return [
            'student_name' => $this->faker->name(),
            'class_teacher_id' => Teacher::factory(),  // Link to the Teacher factory
            'class' => $this->faker->word(),
            'admission_date' => $this->faker->date(),
            'yearly_fees' => $this->faker->numberBetween(1000, 5000),
        ];
    }
}
