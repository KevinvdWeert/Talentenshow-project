-- Add an admin user to the users table
-- Replace 'admin' and the password hash as needed

INSERT INTO users (username, password)
VALUES (
    'admin',
    -- Password: admin123 (hashed with PHP's password_hash)
    '$2y$10$e0NR0n6Qw8QyQqQw8QyQqOQw8QyQqQw8QyQqQw8QyQqQw8QyQqQy'
);
