<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use Rebing\GraphQL\Support\Type as GraphQLType;

class Studenttype extends GraphQLType
{
    protected $attributes = [
        'name' => 'Studenttype',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => \GraphQL\Type\Definition\Type::nonNull(\GraphQL\Type\Definition\Type::int()),
                'description' => 'The id of the student'
            ],
            'firstname' => [
                'type' => \GraphQL\Type\Definition\Type::string(),
                'description' => 'The first name of the student'
            ],

        ];
    }
}
