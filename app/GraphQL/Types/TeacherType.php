<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

class TeacherType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TeacherType',
        'description' => 'A teacher type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => \GraphQL\Type\Definition\Type::nonNull(\GraphQL\Type\Definition\Type::int()),
                'description' => 'The id of the teacher'
            ],
            'firstname' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The first name of the teacher'
            ],
            'lastname' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The last name of the teacher'
            ],
            'email' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The email of the teacher'
            ],
            'contact_no' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The contact number of the teacher'
            ],
            'subject' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The subject the teacher teaches'
            ],
            'hire_date' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The hire date of the teacher'
            ],
        ];
    }
}
