CREATE TABLE IF NOT EXISTS jokes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    joke_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS comment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    joke_id INT NOT NULL,
    user_id INT,
    rating INT NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (joke_id) REFERENCES jokes(id)
);


CREATE TABLE IF NOT EXISTS`users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(111) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(111) NOT NULL
);