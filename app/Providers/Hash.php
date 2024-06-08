<?php

namespace App\Providers;

class Hash {
    /**
     * Hash the password using Bcrypt.
     *
     * @param string $value
     * @return string
     */
    public static function make($value) {
        return password_hash($value, PASSWORD_BCRYPT);
    }

    /**
     * Verify a value against a hash.
     *
     * @param string $value
     * @param string $hashedValue
     * @return bool
     */
    public static function check($value, $hashedValue) {
        return password_verify($value, $hashedValue);
    }

    /**
     * Check if a hash has been hashed using the given options.
     *
     * @param string $hashedValue
     * @param array $options
     * @return bool
     */
    public static function needsRehash($hashedValue, $options = []) {
        return password_needs_rehash($hashedValue, PASSWORD_BCRYPT, $options);
    }
}