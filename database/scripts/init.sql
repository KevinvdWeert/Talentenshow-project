-- Admin users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Participants table
CREATE TABLE IF NOT EXISTS participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_code VARCHAR(12) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    artist_display_name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    email VARCHAR(100) NOT NULL,
    category ENUM('singing', 'dancing', 'dj', 'band', 'comedy', 'magic', 'theater', 'other') NOT NULL,
    age INT NOT NULL,
    performance_time DATETIME DEFAULT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Visitors table
CREATE TABLE IF NOT EXISTS visitors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    email VARCHAR(100) NOT NULL,
    ticket_count INT NOT NULL,
    ordered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert default admin user (username: admin, password: admin)
DELETE FROM users WHERE username = 'admin';
INSERT INTO users (username, password) VALUES
('admin', '$2b$12$O5nY94WSKD5YbKYBmInPa.JKyCzoH4tF0itr57gW3UI.I79J.lNK6'); -- password: admin
