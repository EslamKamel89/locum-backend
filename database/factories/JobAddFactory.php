<?php

namespace Database\Factories;

use App\Models\JobInfo;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobAdd>
 */
class JobAddFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public static int $countSeq = 1;
    public function definition(): array {
        return [
            'title' => 'Experienced: ' . JobInfo::inRandomOrder()->first()->name . ' needed ',

            'job_type' => fake()->randomElement(['Locum-Fulltime', 'Locum-Parttime', 'Locum-Contract']),
            'location' => fake()->address(),
            'description' => $this->descriptions[fake()->numberBetween(0, count($this->descriptions) - 1)],
            'responsibilities' => $this->responsibilities[fake()->numberBetween(0, count($this->responsibilities) - 1)],
            'qualifications' => $this->qualifications[fake()->numberBetween(0, count($this->qualifications) - 1)],
            'experience_required' => $this->experienceRequired[fake()->numberBetween(0, count($this->experienceRequired) - 1)],
            'salary_min' => fake()->numberBetween(10000, 15000),
            'salary_max' => fake()->numberBetween(15000, 20000),
            'benefits' => $this->benefits[fake()->numberBetween(0, count($this->benefits) - 1)],
            'working_hours' => $this->workingHours[fake()->numberBetween(0, count($this->workingHours) - 1)],
            'application_deadline' => fake()->date(),
            'required_documents' => $this->requiredDocuments[fake()->numberBetween(0, count($this->requiredDocuments) - 1)],
        ];
    }
    private array $descriptions = [
        'We are looking for a dedicated professional to join our team.',
        'Seeking an enthusiastic individual to contribute to our growing company.',
        'Join a dynamic organization offering exciting career opportunities.',
        'An opportunity to work in a fast-paced environment with growth potential.',
        'Work with a passionate team focused on delivering quality services.',
        'Exciting role for someone who thrives in a collaborative setting.',
        'Be part of a forward-thinking company making an impact in the industry.',
        'This role offers a unique blend of creativity and structure.',
        'Supportive workplace culture with room for innovation.',
        'Looking for a self-starter who can take initiative and deliver results.',
    ];

    private array $responsibilities = [
        'Perform daily tasks as assigned',
        'Collaborate with team members to achieve goals',
        'Maintain accurate records and documentation',
        'Provide support to senior staff when needed',
        'Assist in planning and executing company initiatives',
        'Communicate effectively with internal and external stakeholders',
        'Monitor performance metrics and report findings',
        'Ensure compliance with company policies and procedures',
        'Train or mentor junior employees if applicable',
        'Attend meetings and provide input on key decisions',
    ];

    private array $qualifications = [
        'Bachelor’s degree in related field required',
        'Previous experience in similar role preferred',
        'Strong communication and interpersonal skills',
        'Excellent organizational and time management abilities',
        'Proficiency in Microsoft Office Suite',
        'Ability to work independently and in teams',
        'Detail-oriented with strong analytical skills',
        'Valid license or certification where applicable',
        'Basic understanding of relevant software tools',
        'Willingness to learn and adapt to new systems',
    ];

    private array $experienceRequired = [
        'Minimum 1 year of experience',
        '2-3 years of related experience preferred',
        'Entry-level candidates welcome',
        'At least 5 years of experience in the field',
        'Experience managing a team or project',
        'Customer service or client-facing experience',
        'Prior leadership or supervisory experience',
        'Experience working remotely or in hybrid setups',
        'Experience with remote collaboration tools (e.g., Slack, Zoom)',
        'Demonstrated ability to meet deadlines under pressure',
    ];

    private array $benefits = [
        'Competitive salary package',
        'Health, dental, and vision insurance',
        'Paid vacation and sick leave',
        'Flexible work schedule options',
        'Remote work availability',
        'Professional development and training',
        '401(k) retirement plan with employer match',
        'Employee wellness programs',
        'Team-building events and social activities',
        'Performance-based bonuses',
    ];

    private array $workingHours = [
        '8 hours shift',
        '9 to 5, Monday through Friday',
        'Rotating shifts including weekends',
        'Part-time: 20–25 hours per week',
        'Full-time: 40 hours per week',
        'Evening shifts available',
        'Weekend-only positions',
        'Flexible hours based on need',
        'Hybrid schedule with office and remote days',
        'Overtime opportunities available',
    ];

    private array $requiredDocuments = [
        'Resume or CV',
        'Cover letter',
        'Official transcripts',
        'Professional certifications',
        'Proof of licensure',
        'Writing samples or portfolio',
        'References from previous employers',
        'Completed application form',
        'Passport or government ID',
        'Background check authorization',
    ];
}
