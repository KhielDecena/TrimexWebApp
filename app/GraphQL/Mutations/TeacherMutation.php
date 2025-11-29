<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use GraphQL;

class TeacherMutation extends Mutation
{
    protected $attributes = [
        'name' => 'teacher',
        'description' => 'A mutation for teachers'
    ];

    public function type(): Type
    {
        return GraphQL::type('teacher_type');
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
            'teacher_input' => [
                'name' => 'teacher_input',
                'type' => GraphQL::type('teacher_input'),
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $action = $args['action_type'] ?? null;
        $input = $args['teacher_input'] ?? [];

        if ($action === 'create') {
            if (isset($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            }
            $teacher = Teacher::create($input);
            return $teacher;
        }

        if ($action === 'update' && isset($args['teacher_id'])) {
            $teacher = Teacher::find($args['teacher_id']);
            if (!$teacher) {
                return null;
            }
            if (isset($input['password'])) {
                $input['password'] = Hash::make($input['password']);
            }
            $teacher->update($input);
            return $teacher;
        }

        if ($action === 'delete' && isset($args['teacher_id'])) {
            $teacher = Teacher::find($args['teacher_id']);
            if ($teacher) {
                $teacher->delete();
            }
            return $teacher;
        }

        // default: return null
        return null;
    }
}
