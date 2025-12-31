USE todo_db;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    category VARCHAR(50),
    status ENUM('pending', 'done') DEFAULT 'pending'
);
