<?php
/*
 * 
 */

namespace TodoList\Mapping;

use \DateTime;
use \TodoList\Model\Todo;

/**
 * Mapper for {@link \TodoList\Model\Todo} from array.
 * @see \TodoList\Validation\TodoValidator
 */
final class TodoMapper {

    private function __construct() {
    }

    /**
     * Maps array to the given {@link Todo}.
     * <p>
     * Expected properties are:
     * <ul>
     *   <li>id</li>
     *   <li>priority</li>
     *   <li>created_on</li>
     *   <li>due_on</li>
     *   <li>last_modified_on</li>
     *   <li>title</li>
     *   <li>description</li>
     *   <li>comment</li>
     *   <li>status</li>
     *   <li>deleted</li>
     * </ul>
     * @param Todo $todo
     * @param array $properties
     */
    public static function map(Todo $todo, array $properties) {
        if (array_key_exists('id', $properties)) {
            $todo->setId($properties['id']);
        }
        if (array_key_exists('priority', $properties)) {
            $todo->setPriority($properties['priority']);
        }
        if (array_key_exists('created_on', $properties)) {
            $createdOn = self::createDateTime($properties['created_on']);
            if ($createdOn) {
                $todo->setCreatedOn($createdOn);
            }
        }
        if (array_key_exists('due_on', $properties)) {
            $dueOn = self::createDateTime($properties['due_on']);
            if ($dueOn) {
                $todo->setDueOn($dueOn);
            }
        }
        if (array_key_exists('last_modified_on', $properties)) {
            $lastModifiedOn = self::createDateTime($properties['last_modified_on']);
            if ($lastModifiedOn) {
                $todo->setLastModifiedOn($lastModifiedOn);
            }
        }
        if (array_key_exists('title', $properties)) {
            $todo->setTitle(trim($properties['title']));
        }
        if (array_key_exists('description', $properties)) {
            $todo->setDescription(trim($properties['description']));
        }
        if (array_key_exists('comment', $properties)) {
            $todo->setComment(trim($properties['comment']));
        }
        if (array_key_exists('status', $properties)) {
            $todo->setStatus($properties['status']);
        }
        if (array_key_exists('deleted', $properties)) {
            $todo->setDeleted($properties['deleted']);
        }
    }

    private static function createDateTime($input) {
        return DateTime::createFromFormat('Y-n-j H:i:s', $input);
    }

}
