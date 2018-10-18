CREATE TABLE actors (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    birthYear SMALLINT
);

CREATE TABLE movies (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    runtime SMALLINT,
    year SMALLINT
);

CREATE TABLE actor_movie (
    id SERIAL PRIMARY KEY,
    actors_id INT NOT NULL REFERENCES actors(id),
    movies_id INT NOT NULL REFERENCES movies(id)
);

INSERT INTO actors(name, birthYear) VALUES ('Jimmy Stewart', 1908);

INSERT INTO actors(name, birthYear) VALUES ('Anne Hathaway', 1982);

INSERT INTO actors(name, birthYear) VALUES ('Tom Cruise', 1962), ('Meryl Streep', 1949), ('Carrie Fisher', 1956);

SELECT * FROM actors ORDER BY birthYear;

INSERT INTO movies(title, runtime, year) VALUES ('It''s a Wonderful Life', 120, 1946), ('The Devil Wears Prada', 125, 2006), ('Guardians of the Galaxy', 140, 2014);

INSERT INTO actor_movie (actors_id, movies_id) VALUES (6, 2), (4, 2), (1, 1), (2, 3);

SELECT * FROM movies WHERE title = 'The Devil Wears Prada';

SELECT * FROM movies WHERE title LIKE '%Life%';

SELECT a.name, m.title FROM movies m
    INNER JOIN actor_movie am ON m.id = am.movies_id
    INNER JOIN actors a ON am.actors_id = a.id WHERE m.title = 'The Devil Wears Prada' ORDER BY m.year;
