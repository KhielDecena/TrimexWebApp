<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL;
use App\Models\student;

class StudentQuery extends Query
{
    protected $attributes = [
        'name' => 'student',
        'description' => 'A query'
    ];

    public function type(): Type
    {
        return Type::listOf(\GraphQL::type('student_type'));
    }

    public function args(): array
    {
        return [
            'action_Type' => [
                'name' => 'action_Type',
                'type' => Type::string(),
            ],

            'student_id' => [
                'name' => 'student_id',
                'type' => Type::string(),
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::string(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ],
            'contact_number' => [
                'name' => 'contact_number',
                'type' => Type::string(),
            ],
            
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {

        $student = new student();

        if ($args['action_type'] === dispaly_all) {
            return $student->dispaly_all();

        }
        if($args['action_type'] === dispaly_by_id){
            return $student->displayById($args['student_id']);  
        }
    }
}
