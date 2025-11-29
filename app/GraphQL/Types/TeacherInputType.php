<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\InputType;

class TeacherInputType extends InputType
{
    protected $attributes = [
        'name' => 'TeacherInput',
        'description' => 'Input type for teacher'
    ];

    public function fields(): array
    {
        return [
            'firstname' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
            ],
            'lastname' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
            ],
            'email' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
            ],
            'contact_no' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
            ],
            'password' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
            ],x
        ];
    }
}
