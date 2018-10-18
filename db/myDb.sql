# A few helpful commands you might want during the process:
# \dt - Lists the tables
# \d+ public.user - Shows the details of the user table
# DROP TABLE public.user - Removes the user table completely so we can re-create it
# \q - Quit the application and go back to the regular command prompt

CREATE TABLE public.user
(
    id SERIAL NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    display_name VARCHAR(100) NOT NULL
);

CREATE TABLE public.meal_plan
(
    id SERIAL NOT NULL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES public.user(id),
    start_date DATE,
    end_date DATE
);

CREATE TABLE public.category
(
    id SERIAL NOT NULL PRIMARY KEY,
    recipe_category TEXT NOT NULL
);

CREATE TABLE public.recipe
(
    id SERIAL NOT NULL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES public.user(id),
    recipe_title TEXT NOT NULL,
    recipe_ingredients TEXT NOT NULL,
    recipe_category INT NOT NULL REFERENCES public.category(id)
);

CREATE TABLE public.meal_plan_recipe
(
    id SERIAL NOT NULL PRIMARY KEY,
    recipe_id INT NOT NULL REFERENCES public.recipe(id),
    meal_plan_id INT NOT NULL REFERENCES public.meal_plan(id),
);
