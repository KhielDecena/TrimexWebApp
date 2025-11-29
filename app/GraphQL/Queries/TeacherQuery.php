<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;
use GraphQL;
use App\Models\Teacher;

class TeacherQuery extends Query
{
    protected $attributes = [
        'name' => 'teacher',
        'description' => 'A query for teachers'
    ];

    public function type(): Type
    {
        return Type::listOf(\GraphQL::type('teacher_type'));
    }

    public function args(): array
    {
        return [
            'action_type' => [
                'name' => 'action_type',
                'type' => Type::string(),
            ],
            'teacher_id' => [
                'name' => 'teacher_id',
                'type' => Type::int(),
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $teacher = new Teacher();

        $action = $args['action_type'] ?? null;

        if ($action === 'display_all') {
            return $teacher->displayAll();
        }

        if ($action === 'display_by_id' && isset($args['teacher_id'])) {
            $result = $teacher->displayById($args['teacher_id']);
            return $result ? [$result] : [];
        }

        // default: return all
        return $teacher->displayAll();
    }
}
