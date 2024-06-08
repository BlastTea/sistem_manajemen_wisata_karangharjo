<?php

namespace App\Providers;

class Validator
{
    protected $data;
    protected $rules;
    protected $errors = [];

    public function __construct(array $data, array $rules)
    {
        $this->data = $data;
        $this->rules = $this->parseRules($rules);
    }

    public static function make(array $data, array $rules)
    {
        $validator = new self($data, $rules);
        return $validator->validate();
    }

    protected function parseRules(array $rules)
    {
        $parsedRules = [];
        foreach ($rules as $field => $ruleString) {
            $rulesExploded = explode('|', $ruleString);
            foreach ($rulesExploded as $rule) {
                if (strpos($rule, 'sometimes') === 0) {
                    if ($this->shouldApplyRule($field)) {
                        $parsedRules[$field] = array_merge($parsedRules[$field] ?? [], $this->parseRule($rule));
                    }
                } else {
                    $parsedRules[$field] = array_merge($parsedRules[$field] ?? [], $this->parseRule($rule));
                }
            }
        }
        return $parsedRules;
    }

    protected function parseRule($rule)
    {
        $parts = explode(':', $rule, 2);
        $ruleName = $parts[0];
        $ruleValue = isset($parts[1]) ? explode(',', $parts[1]) : null;
        return [$ruleName => $ruleValue];
    }

    protected function shouldApplyRule($field)
    {
        return isset($this->data[$field]) && !empty($this->data[$field]);
    }

    public function validate()
    {
        foreach ($this->rules as $field => $fieldRules) {
            foreach ($fieldRules as $ruleName => $ruleValue) {
                $this->applyRule($field, $ruleName, $ruleValue);
            }
        }
        return $this;
    }

    protected function applyRule($field, $ruleName, $ruleValue)
    {
        $value = $this->data[$field] ?? null;

        switch ($ruleName) {
            case 'required':
                if (empty($value)) {
                    $this->errors[$field][] = "The $field field is required.";
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$field][] = "The $field must be a valid email address.";
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                    $this->errors[$field][] = "The $field must be at least $ruleValue characters.";
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                    $this->errors[$field][] = "The $field may not be greater than $ruleValue characters.";
                }
                break;
            case 'integer':
                if (!filter_var($value, FILTER_VALIDATE_INT)) {
                    $this->errors[$field][] = "The $field must be an integer.";
                }
                break;
            case 'string':
                if (!is_string($value)) {
                    $this->errors[$field][] = "The $field must be a string.";
                }
                break;
            case 'enum':
                if (!in_array($value, $ruleValue)) {
                    $this->errors[$field][] = "The $field must be one of the following values: " . implode(', ', $ruleValue) . ".";
                }
                break;
        }
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
