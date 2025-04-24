<?php

namespace Database\Seeders;

use App\Models\DishCategory;
use App\Models\DishSubcategory;
use Illuminate\Database\Seeder;

class DishSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Breakfasts' => [
                'Porridges', 'Eggs', 'Omelette', 'Fried Eggs', 'Porridges with Water', 'Cottage Cheese Pancakes', 'Cottage Cheese Casserole',
                'Cottage Cheese Pancakes with Curd', 'Oatmeal', 'Rice Porridge', 'Milk Porridges', 'Frittata', 'Draniki', 'Millet Porridge',
                'Poached Eggs', 'Baked Cottage Cheese Pancakes', 'Semolina Porridge', 'Oven-Baked Cottage Cheese Pancakes', 'Cottage Cheese Pancakes with Semolina',
                'Omelette with Cheese', 'Muesli', 'Sweet Porridges', 'Muesli Bars', 'Granola', 'Shakshuka', 'Oven-Baked Cottage Cheese Pancakes', 'Omelette with Milk',
                'Cottage Cheese Pancakes with Semolina', 'Cottage Cheese Pancakes with Apples', 'Oven Omelette', 'Cottage Cheese Pancakes with Raisins',
                'Fluffy Omelette', 'Cottage Cheese Pancakes with Carrots', 'Flour-Free Cottage Cheese Pancakes', 'Cottage Cheese Pancakes with Sour Cream',
                'Homemade Muesli'
            ],
            'Broths' => [
                'Chicken Broth', 'Vegetable Broth', 'Meat Broth', 'Fish Broth', 'Mushroom Broth'
            ],
            'Appetizers' => [
                'Hot Appetizers', 'Cold Appetizers', 'Cheese Appetizers', 'Pâtés', 'New Year Appetizers', 'Rolls', 'Appetizers for the Holiday Table',
                'Tartare', 'Dip', 'Stuffing for Tartlets', 'Chips', 'Hummus', 'Carpaccio', 'Canapés', 'Tartlets with Cheese', 'Butter', 'Lavash Roll',
                'Guacamole', 'Zucchini Casserole', 'Salted Fish', 'Tortilla', 'Fondue', 'Tacos', 'Eggplant Caviar', 'Jellied Meat', 'Forshmak', 'Stuffed Eggs',
                'Aspic', 'Cottage Cheese Appetizers', 'Lobio', 'Quesadilla', 'Zucchini Caviar', 'Satsivi', 'Lecho', 'Easter Eggs', 'Cheese Balls', 'Cheese Fondue',
                'Tartlets with Mushrooms', 'Tomatoes with Cheese', 'Appetizer Cakes', 'Balyk', 'Basturma'
            ],
            'Drinks' => [
                'Cocktails', 'Alcoholic Drinks', 'Smoothies', 'Alcoholic Cocktails', 'Non-Alcoholic Drinks', 'Coffee', 'Lemonade', 'Tea', 'Compote',
                'Milkshake', 'Punch', 'Hot Chocolate', 'Non-Alcoholic Cocktails', 'Gin Cocktails', 'Mulled Wine', 'Rum Cocktails', 'Vodka Cocktails',
                'Liquors', 'Banana Smoothie', 'Juices', 'Wine Cocktails', 'Mojito', 'Morse', 'Whiskey Cocktails', 'Kissel', 'Tequila Cocktails', 'Brandy Cocktails',
                'Infusions', 'Cocoa', 'Sangria', 'Grog', 'Carbonated Drinks', 'Sbiten', 'Strawberry Smoothie', 'Kvass', 'Wines', 'Liqueurs', 'Cider',
                'Glögg', 'White Sangria', 'Moonshine', 'Non-Alcoholic Sangria'
            ],
            'Main Dishes' => [
                'Casserole', 'Cutlets', 'Rolls', 'Stew', 'Steaks', 'Noodles', 'Liver Dishes', 'Vegetable Dishes', 'Minced Meat Dishes', 'Lamb Dishes',
                'Mashed Potatoes', 'Fish Dishes', 'Shashlik', 'Poultry Dishes', 'Meat Dishes', 'Chicken Dishes', 'Turkey Recipes', 'Pilaf', 'Rolls',
                'Buckwheat Porridge', 'Roast', 'Potatoes with Mushrooms', 'Baked Chicken', 'Lasagna', 'Dumplings', 'Dishes with Soy Sauce', 'Stuffed Pepper',
                'Vegetable Stew', 'Chicken Cutlets', 'Baked Vegetables', 'Baked Meat', 'Dumplings', 'Fish in the Oven', 'Meatballs', 'Cabbage Rolls', 'Meatballs',
                'Pork Cutlets', 'Julienne', 'Gratin', 'Beef Dishes', 'Stuffed Dishes', 'Shashlik Marinades', 'New Year Pork Dishes', 'Fish Cutlets',
                'In Batter', 'Rice Dishes', 'Sauté', 'Goulash', 'Deruny', 'In Foil', 'Holiday Chicken Dishes', 'Paella', 'Zrazy', 'Kebab', 'Ratatouille',
                'Cereal Dishes', 'Croquettes', 'Vegetable Stew with Zucchini', 'Schnitzel', 'Stuffed Pepper with Rice', 'Pork Shashlik', 'Seafood Dishes',
                'Shawarma', 'Holiday Chicken Dishes', 'Cutlets', 'Polenta', 'Moussaka', 'Burrito', 'Manti', 'Beefsteak', 'Dumplings', 'Turkey Cutlets',
                'Chicken Shashlik', 'Julienne with Chicken and Mushrooms', 'Beef Stroganoff', 'Beef Goulash', 'Roast Beef', 'Dolma', 'Chakhokhbili', 'In Sleeve',
                'Tabaka Chicken', 'French-Style Meat', 'Lula Kebab', 'Fricassee', 'Escalope', 'Khinkali', 'Buzhenina', 'Lamb Shashlik', 'Azu', 'Lenten Cutlets',
                'Chicken Pilaf', 'Rabbit Recipes', 'Nuggets', 'Navy Macaroni', 'Uzbek Pilaf', 'Ajapsandali', 'Steamed Cutlets', 'Liver Cake', 'Galushki',
                'Rice Meatballs', 'Pork Goulash', 'Bigus', 'Meatballs in Tomato Sauce', 'Kiev Cutlets', 'Chanakhi', 'Beshbarmak', 'Holiday Chicken Dishes',
                'Stew', 'Oven Meatballs', 'Risotto', 'Khashlama', 'Brioche', 'Pork Pilaf', 'Liver Cutlets', 'Mamaliga', 'Koldu', 'Lenten Dumplings', 'Hanum',
                'Kutya', 'Romstek'
            ],
            'Pasta and Pizza' => [
                'Spaghetti', 'Oven Pizza', 'Macaroni', 'Italian Pizza', 'Carbonara Pasta', 'Ravioli', 'Homemade Pasta', 'Penne', 'Cheese Pizza',
                'Tomato Pizza', 'Pizza Dough', 'Gnocchi', 'Fettuccine', 'Linguine', 'Sausage Pizza', 'Tagliatelle', 'Mushroom Pasta', 'Thin Pizza',
                'Cannelloni', 'Bolognese', 'Farfalle', 'Mushroom Pizza', 'Fusilli', 'Yeast Pizza', 'Seafood Pizza', 'Meat Pizza', 'Seafood Pasta',
                'Ham Pizza', 'Tortellini', 'Orecchiette', 'Chicken Pizza', 'Margherita', 'Fried Pizza', 'Pappardelle', 'Pasta with Cream Sauce', 'Four Cheese Pizza',
                'Milk Pizza', 'Quick Pizza Dough', 'Diet Pizza', 'No-Yeast Pizza Dough', 'Tagliolini', 'Shrimp Pasta', 'Chicken Pasta', 'Pizza with Mince',
                'Pepperoni', 'Garganelli'
            ],
            'Risotto' => [
                'Vegetable Risotto', 'Mushroom Risotto', 'Seafood Risotto', 'Meat Risotto', 'Risotto Without Rice', 'Milanese Risotto', 'Chicken Risotto'
            ],
            'Salads' => [
                'Vegetable Salads', 'Salads Without Mayonnaise', 'Chicken Salads', 'Fruit Salads', 'Fish Salads', 'Warm Salads', 'Classic Salads',
                'Summer Salads', 'Vegetarian Salads', 'Meat Salads', 'Layered Salads', 'New Year Salads', 'Salads with Mayonnaise', 'Olivier', 'Vinaigrette',
                'Cucumber Salads', 'Eggplant Salads', 'Caesar Salad', 'Cheese Salads', 'Cabbage Salads', 'Salads with Pineapple', 'Crab Salad',
                'Egg Salads', 'Zucchini Salads', 'Seafood Salads', 'Olivier with Pickles', 'Tomato Salads', 'Sweet Salads', 'Under a Fur Coat',
                'Mushroom Salads', 'Squid Salads', 'Herring Under a Fur Coat', 'Bean Salads', 'Mimosa', 'Holiday Salads', 'Greek Salad', 'Olivier with Meat',
                'Shrimp Salads', 'Spicy Salads', 'Lenten Salads', 'Diet Salads', 'Olivier with Seafood', 'Olivier with Chicken', 'Olivier with Sausage',
                'Korean Salads', 'Olivier with Apple', 'Olivier with Red Caviar', 'Salads with Pancakes', 'Olivier with Fish', 'Pomegranate Bracelet',
                'Caesar with Chicken'
            ],
            'Sauces and Marinades' => [
                'Fish Sauces', 'Mayonnaise', 'Pesto Sauce', 'Tomato Sauce', 'Meat Sauces', 'Chutney', 'Teriyaki', 'Salsa', 'Poultry Sauces', 'Mushroom Sauce',
                'Cheese Sauce', 'Béchamel Sauce', 'Pork Marinade', 'Sour Cream Sauce', 'Mustard', 'Barbecue', 'Adjika', 'Tartar Sauce', 'Garlic Sauce',
                'Cream Sauce', 'Caesar Sauce', 'Chicken Marinade', 'Ketchup', 'Mustard Sauce', 'Salad Dressing', 'Sweet Sauces', 'Fish Marinade', 'Soy Sauce Marinade',
                'Tkemali', 'Beef Marinade', 'Kefir Marinade', 'Sweet-Sour Sauce', 'Honey Sauce'
            ],
            'Soups' => [
                'Puree Soup', 'Cream Soup', 'Chicken Soup', 'Pea Soup', 'Borscht', 'Cold Soups', 'Fish Soup', 'Mushroom Soup', 'Vegetable Soups',
                'Tomato Soup', 'Pumpkin Soup', 'Borscht with Beetroot', 'Red Borscht', 'Borscht with Tomatoes', 'Soljanka', 'Gazpacho', 'Shchi',
                'Potato Soup', 'Meat Soup', 'Cheese Soup', 'Homemade Soljanka', 'Borscht with Garlic', 'Fruit and Berry Soup', 'Bean Soup', 'Onion Soup',
                'Okroshka', 'Noodle Soup', 'Ukrainian Borscht', 'Uha', 'Russian Okroshka', 'Porridge Soup', 'Rice Soup', 'Borscht with Beef', 'Classic Borscht',
                'Lentil Soup', 'Rassolnik', 'Borscht Without Meat', 'Classic Okroshka', 'Mixed Soljanka', 'Borscht Without Cabbage', 'Beetroot Soup',
                'Borscht with Pork', 'Okroshka on Kvass', 'Milk Soup', 'Minestrone', 'Kharcho Soup', 'Soup with Meatballs', 'Cabbage Soljanka', 'Okroshka on Sour Cream',
                'Miso', 'Soup with Vermicelli', 'Lenten Soups', 'Green Borscht', 'Soup with Dumplings', 'Tom Yum', 'Borscht Without Beetroot', 'Soljanka with Potatoes',
                'Shchi from Sauerkraut', 'Okroshka with Sausage', 'Borscht with Chicken', 'Shurpa', 'Borscht with Sorrel', 'Borscht with Beans', 'Laghman',
                'Fish Soljanka', 'Mushroom Soljanka', 'Soljanka with Sausage', 'Okroshka on Kefir', 'Cold Borscht', 'Cold Soup', 'Lenten Borscht', 'Taratour',
                'Kapustnyak', 'Botvinya', 'Okroshka on Kvass Classic', 'Okroshka on Kvass with Sausage', 'Soljanka with Smoked Meat', 'Khash', 'Okroshka on Mayonnaise',
                'Bozbash', 'Bouillabaisse', 'Kuksi', 'Borscht with Prunes', 'Okroshka with Sausage on Kvass', 'Okroshka with Vinegar', 'Okroshka on Broth',
                'Mushroom Okroshka', 'Borscht with Pampushki', 'Dovga', 'Okroshka on Whey', 'Kulesh', 'Okroshka on Bread'
            ],
            'Sandwiches' => [
                'Open Sandwich', 'Toasts', 'Club Sandwich', 'Bruschetta', 'Hamburger', 'Closed Sandwich', 'Sandwiches for the Holiday Table',
                'Hot Sandwiches', 'Cheese Sandwiches', 'Hot Dog', 'Cheeseburger', 'Fish Sandwiches', 'Panini', 'Sandwiches with Red Caviar',
                'Croque Madame', 'Croque Monsieur', 'Sandwiches with Herring'
            ],
            'Baking and Desserts' => [
                'Pies', 'Cakes', 'Cookies', 'Fruit Desserts', 'Pancakes', 'Muffins', 'Bread', 'Yeast-Free Pancakes', 'Baked Muffins', 'Ice Cream', 'Fritters',
                'Apple Pies', 'Unleavened Bread', 'Pastries', 'Cupcakes', 'Puddings', 'Pies', 'Dessert Creams', 'Buns', 'Cheesecake', 'Candies', 'Muffins in Molds',
                'Jelly', 'Milk Pancakes', 'Milk Muffins', 'Mousse', 'Syrup', 'Soufflé', 'Chocolate Cake', 'Pancakes', 'Flatbreads', 'Sweet Rolls', 'Brownies',
                'Charlotte', 'Sponge Cake', 'Oatmeal Cookies', 'No-Bake Desserts', 'Tartlets', 'Chocolate Muffins', 'Easter Cakes', 'Meringues', 'Cottage Cheese Desserts',
                'Stuffed Pancakes', 'Quiche', 'Apple Charlotte', 'Lemon Muffins', 'Baked Charlotte', 'Waffles', 'Thin Pancakes', 'Raisin Muffins', 'Tiramisu',
                'Cupcakes', 'Pancakes', 'Lenten Baking', 'Baking with Cottage Cheese', 'Thin Pancakes with Milk', 'Strudel', 'Doughnuts', 'Sorbet', 'Shortbread Cookies',
                'Pancake Fillings', 'Dough for Pies', 'Eggless Pancakes', 'Sponge Cake', 'Cottage Cheese Pies', 'Cottage Cheese Muffins', 'Gingerbread', 'Layered Pies',
                'Cabbage Pies', 'Crispy Toasts', 'Khachapuri', 'Semolina Cake', 'Banana Muffins', 'Zucchini Fritters', 'Stuffed Pancakes', 'Low-Calorie Desserts',
                'Galettes', 'Pastry Baskets', 'Kefir Muffins', 'Sweet Pancakes', 'Biscotti', 'Cottage Cheese Pancakes', 'Eclairs', 'Puff Pastry', 'Pancakes on Kefir',
                'Napoleon Cake', 'Pancake Cakes', 'Lenten Desserts', 'Cottage Cheese Cookies', 'Honey Cake', 'Buns', 'Chocolate Muffins', 'Lenten Muffins', 'Croissants',
                'World Pancakes', 'Marshmallows', 'Lenten Pies', 'Kefir Pancakes', 'Fritters on Kefir', 'Carrot Muffins', 'Rogalik Pastries', 'Strawberry Pies', 'Cottage Cheese Easter',
                'Gingerbread Dough', 'Apple Muffins', 'Pancakes with Chicken', 'Cottage Cheese Cake', 'Profiteroles', 'Unsweetened Cookies', 'Honey Cake', 'Focaccia',
                'Honey Cake', 'Cookies with Filling', 'Sour Cream Cake', 'Pancakes with Water', 'Pastry Tubes', 'Kurnik Pies', 'Thick Pancakes', 'Baklava',
                'Pancakes with Meat', 'Glaze', 'Cottage Cheese Pastries', 'Lenten Cookies', 'Kefir Bread', 'Custard Cake', 'Biscuits', 'Pancakes with Holes', 'Crunches',
                'Bird’s Milk Cake', 'Banana Muffins', 'Pastila', 'Sponge Cookies', 'Bagels', 'Healthy Pancakes', 'Buns', 'Belyashi', 'Ant Hill Cake', 'Yeast Pancakes'
            ],
            'Preparations' => [
                'Pickles and Preservation', 'Jam', 'Vegetables for Winter', 'Tomatoes for Winter', 'Jams', 'Peppers for Winter', 'Cabbage for Winter',
                'Cucumbers for Winter', 'Compotes for Winter', 'Zucchini for Winter', 'Pickled Cucumbers', 'Pickled Cucumbers with Vinegar', 'Lightly Salted Cucumbers',
                'Mushrooms for Winter', 'Salads for Winter', 'Garlic for Winter', 'Pumpkin for Winter', 'Salted Cucumbers', 'Watermelon for Winter', 'Pickled Cucumbers'
            ]
        ];

        foreach ($categories as $categoryName => $subcategories){
            $data = [];

            // get id of category by name
            $categoryId = DishCategory::where('name', $categoryName)->first()->id;

            foreach ($subcategories as $subcategoryName){
                $data[] = [
                    'dish_category_id' =>  $categoryId,
                    'name' => $subcategoryName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // 1000 => 891 ms
            // 300 => 491 ms
            // change length in case there is too much data (1000)
            foreach (array_chunk($data, 300) as $chunk){
                DishSubcategory::insert($chunk);
            }
        }
    }
}
