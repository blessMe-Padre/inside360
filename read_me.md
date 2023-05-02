SQL: Создание таблицы на локальном сервере

CREATE TABLE counts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    count_value INT NOT NULL
);

INSERT INTO counts (count_value) VALUES (0);