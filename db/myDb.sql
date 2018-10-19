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


-- Inserting dummy data into db --
INSERT INTO public.user (username, password, display_name) VALUES
('s_luke', 'pass123', 'Sarah Luke')
, ('h_shattuck', 'pass123', 'Heidi Shattuck')
, ('a_parson', 'pass123', 'Alison Parson');

INSERT INTO meal_plan(user_id, start_date, end_date) VALUES
(1, '2018-10-22', '2018-10-29')
, (2, '2018-10-22', '2018-10-29');

INSERT INTO public.category(recipe_category) VALUES
('Desserts')
, ('Chicken')
, ('Beef')
, ('Breakfast')
, ('Bread')
, ('Soups');

INSERT INTO public.recipe(user_id, recipe_title, recipe_ingredients, recipe_category) VALUES
(1, 'Burritos', '1/2 to 1 lb hamburger, browned and drained
 1 can refried beans
 1/2 can enchilada sauce
 3/4 cup salsa
 flour tortillas
 grated cheese
 sour cream, lettuce, tomatoes for garnish
 ', '3')
, (2, '7-Up Biscuits', '2 cups Bisquick
    ½ cup sour cream
    ½ cup 7-up
    ¼ cup melted butter
    ', '5')
, (1, 'Buttermilk Syrup', '1 cup buttermilk
   1 stick butter
   1 cup sugar
   ½ tsp baking soda
   1 tsp vanilla
   ', 4);

INSERT INTO meal_plan_recipe(recipe_id, meal_plan_id) VALUES
(1,2)
, (2,1);
