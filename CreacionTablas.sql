CREATE TABLE USUARIO(
id int PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
apellido char NOT NULL,
direccion char(100) NOT NULL,
telefono int(10) NOT NULL,
email char NOT NULL,
password char(40) NOT NULL,--Sugerencia MySQL
permiso char NOT NULL,
);

CREATE TABLE PEDIDO(
id in PRIMARY KEY AUTO_INCREMENT,
fecha date() NOT NULL,--Consultar formado de fecha
precio_total float NOT NULL,
cargo_domicilio char NOT NULL, --Validar este campo con Naye
);

insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (1, 'Wooden Blocks', 24.99, 'Classic wooden building blocks for toddlers.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (2, 'Compact Electric Kettle', 29.99, 'Quick-boiling kettle for home and office use.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (3, 'Bamboo Cutting Board Set', 34.99, 'Eco-friendly bamboo cutting boards in various sizes.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (4, 'Sliced Bread', 2.99, 'Soft and fresh sliced bread, perfect for sandwiches.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (5, 'Creamy Spinach Dip', 5.99, 'Deliciously creamy spinach dip, perfect for parties.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (6, 'Vegan chocolate chip cookies', 4.79, 'Delicious soft cookies, dairy-free and egg-free, perfect for treats.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (7, 'Pet Hair Vacuum Cleaner Attachment', 14.99, 'Specialized attachment for removing pet hair from surfaces.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (8, 'Black Bean Spaghetti', 3.99, 'High-protein pasta made from black beans, gluten-free.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (9, 'Savory Oatmeal Cups', 1.99, 'Savory oatmeal ready to eat, great for breakfast or a snack.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (10, 'Kettle Corn Popcorn', 2.99, 'Sweet and salty kettle corn, perfect for snacking.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (11, 'Organic Baby Carrots', 2.99, 'Fresh and crunchy baby carrots ready for snacking.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (12, 'Marinara Parmesan Baked Ziti', 8.49, 'Ziti pasta baked with marinara and parmesan cheese', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (13, 'Pasta Sauce Mix', 1.29, 'Just add water for a quick pasta sauce.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (14, 'Caramelized Onion Dip', 3.99, 'Creamy dip made with caramelized onions, perfect for chips or veggies.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (15, 'Savory Pumpkin Soup', 3.89, 'Creamy pumpkin soup with spices', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (16, 'Vacuum Sealer Machine', 89.99, 'Seal food and maintain freshness longer.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (17, 'Baking Powder', 1.79, 'Essential ingredient for baking fluffy cakes and pastries.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (18, 'Wrap Jumpsuit', 54.99, 'Chic wrap jumpsuit that flatters the body and is perfect for any occasion.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (19, 'Coconut Rice', 2.29, 'Fluffy rice cooked with coconut milk for a tropical twist.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (20, 'Himalayan Pink Salt', 1.99, 'Natural mineral salt with a subtle flavor, ideal for cooking and seasoning.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (21, 'Stuffed Grape Leaves', 5.79, 'Grape leaves stuffed with rice and herbs, ready to eat.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (22, 'Ice Cream Maker', 79.99, 'Homemade ice cream maker for delicious desserts.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (23, 'Sweet Pea Hummus', 4.29, 'Creamy hummus made with sweet peas and tahini.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (24, 'Balsamic Glazed Brussels Sprouts', 4.99, 'Roasted Brussels sprouts drizzled with balsamic glaze.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (25, 'Fresh Lemons', 0.75, 'Citrusy lemons perfect for drinks and cooking.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (26, 'Whole Roasted Chicken', 9.99, 'Seasoned and roasted to perfection, ready to eat.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (27, 'Fashionable Fanny Pack', 24.99, 'A trendy fanny pack, perfect for hands-free outings.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (28, 'Cinnamon Raisin Bagels', 4.19, 'Soft bagels flavored with cinnamon and raisins.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (29, 'Under Desk Footrest', 29.99, 'Adjustable footrest for improved comfort while sitting.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (30, 'Men''s Waterproof Hiking Boots', 89.99, 'Durable boots designed for outdoor hiking and activities.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (31, 'Cabbage Slaw Mix', 2.29, 'Fresh cabbage and carrot slaw mix for salads.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (32, 'Cinnamon Sugar Tortilla Chips', 3.29, 'Crispy chips with a sweet twist, perfect for dipping.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (33, 'Oven Thermometer', 11.99, 'High-precision oven thermometer for accurate cooking.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (34, 'Sliced Bell Peppers', 3.99, 'Fresh sliced bell peppers for salads or stir-fries.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (35, 'Almond Joy Munch Bars', 1.39, 'A delightful mix of chocolate, coconut, and almonds in a snack bar.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (36, 'Digital Wireless Camera', 199.99, 'Secure digital wireless security camera system.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (37, 'Bluetooth Sleep Headphones', 29.99, 'Comfortable wireless headphones designed for sleeping.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (38, 'Fitness Resistance Bands Kit', 29.99, 'Set with various resistance bands for workouts.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (39, 'Athletic Jogging Jacket', 49.99, 'Designed for comfort and performance during workouts.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (40, 'Chia Seeds', 6.99, 'Nutty flavored chia seeds, packed with nutrients.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (41, 'Chewy Granola Bars', 3.49, 'Oats and honey bars with a chewy texture and nutty flavor.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (42, 'Sweet Potato Fries', 3.99, 'Crispy sweet potato fries, a delicious side dish.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (43, 'Smart Water Bottle with Hydration Reminder', 39.99, 'Bottle that tracks your water intake and reminds you to drink.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (44, 'Reusable Silicone Food Storage Bags', 19.99, 'Eco-friendly bags for storing food without plastic waste.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (45, 'Wireless Range Extender', 49.99, 'Boost your Wi-Fi signal for better coverage.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (46, 'Winter Knit Beanie', 14.99, 'Cozy beanie hat to keep your head warm in the cold.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (47, 'Mini Projector', 169.99, 'Portable projector with 1080p resolution for movies.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (48, 'Sooji (Semolina)', 1.99, 'Fine semolina flour, perfect for pasta and desserts.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (49, 'High-Quality Yoga Block', 12.99, 'Foam yoga block for enhancing poses and stability.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (50, 'Electric Griddle', 54.99, 'Large electric griddle for family meals.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (51, 'Warm Wool Sweater', 59.99, 'Cozy wool sweater to keep you warm on chilly days.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (52, 'Classic Beef Chili', 7.99, 'Hearty chili made with premium ground beef and kidney beans.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (53, 'Smartphone Photography Ring Light', 29.99, 'Portable ring light that enhances your photos with perfect lighting.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (54, 'Chili Lime Shrimp', 8.99, 'Frozen shrimp seasoned with chili and lime, perfect for quick dinners.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (55, 'Lentils', 2.99, 'High in protein, perfect for soups and stews.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (56, 'Cream Cheese', 2.69, 'Smooth and creamy, ideal for spreads or baking.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (57, 'Whole Grain Hamburger Buns', 2.69, 'Soft hamburger buns made with whole grains.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (58, 'Peanut Butter Cookies', 3.49, 'Soft and chewy cookies made with creamy peanut butter.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (59, 'Organic Coconut Flour', 5.49, 'Finely ground flour from dried coconut meat.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (60, 'Whole Grain Hamburger Buns', 2.69, 'Soft hamburger buns made with whole grains.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (61, 'Cold Brew Coffee Concentrate', 7.99, 'Rich and smooth cold brew coffee concentrate, just add water or milk.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (62, 'Honey Nut Cheerios', 4.29, 'Classic cereal made with whole grains and honey.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (63, 'Organic Green Lentils', 3.99, 'Nutty flavored lentils, perfect for soups and salads.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (64, 'Camera Tripod', 49.99, 'Sturdy camera tripod for professional photography.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (65, 'Memory Foam Pillow', 39.99, 'Ergonomic memory foam pillow for better sleep.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (66, 'Eco-Friendly Disposable Plates', 22.99, 'Compostable plates suitable for various occasions.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (67, 'Pet Water Fountain with Filtration', 39.99, 'Continuous stream of fresh water for pets, promoting hydration.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (68, 'Chili Lime Corn Chips', 2.79, 'Crunchy corn chips flavored with chili and lime for a zesty kick.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (69, 'Vegetable Medley', 2.99, 'Mixed fresh vegetables for stir-frying or roasting.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (70, 'Shredded Cheese', 4.29, 'Blend of cheddar and mozzarella cheese, great for recipes.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (71, 'Inflatable Party Cooler', 19.99, 'Fun inflatable cooler to keep drinks cold at parties.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (72, 'Gardening Tool Belt', 22.99, 'Convenient belt with pockets for easy access to tools while gardening.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (73, 'Foldable Electric Scooter', 349.99, 'Compact electric scooter for commuting and short trips.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (74, 'Portable Campfire', 39.99, 'Compact campfire for grilling and warmth during camping trips.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (75, 'Teriyaki Chicken Skewers', 8.99, 'Grilled chicken skewers glazed with teriyaki sauce.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (76, 'Garden Vegetable Soup', 3.29, 'A hearty soup filled with vegetables and herbs, perfect for a light meal.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (77, 'Cabbage Slaw Mix', 2.29, 'Fresh cabbage and carrot slaw mix for salads.', 'M');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (78, 'Fruit Medley Juice', 3.49, 'Refreshing juice blend made with various fresh fruits.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (79, 'Window Blinds', 59.99, 'Adjustable window blinds for privacy and light control.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (80, 'Gaming Mousepad', 19.99, 'Oversized gaming mousepad with smooth surface.', 'S');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (81, 'Tomato Paste', 1.29, 'Concentrated tomato paste, great for sauces.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (82, 'Electric Heating Pad', 20.99, 'Microwaveable heating pad for muscle pain relief and relaxation.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (83, 'Cranberry Almond Cookies', 4.29, 'Delicious cookies with cranberries and almonds in every bite.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (84, 'Marinated Artichokes', 3.79, 'Artichoke hearts marinated in herbs and oil.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (85, 'Portable Solar Path Lights', 39.99, 'Eco-friendly solar lights for pathways and gardens.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (86, 'Chickpea Pasta', 4.19, 'Healthy pasta alternative made from chickpeas', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (87, 'Stuffed Grape Leaves', 5.79, 'Grape leaves stuffed with rice and herbs, ready to eat.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (88, 'Poppy Seed Dressing', 3.49, 'A light and tangy dressing with poppy seeds, perfect for salads.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (89, 'Sous Vide Cooker', 79.99, 'Precision cooker for perfect sous vide cooking.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (90, 'Garlic Herb Cream Cheese', 2.99, 'Spreadable cream cheese blended with garlic and herbs.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (91, 'Samoas Cookie Mix', 5.59, 'Baking mix to create your favorite Samoa-style cookies at home.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (92, 'Vegan Mayonnaise', 4.49, 'Plant-based mayonnaise for a creamy taste.', '2XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (93, 'Electronic Drum Kit', 359.99, 'Compact electronic drum kit for musicians of all levels.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (94, 'Compact Hair Dryer', 29.99, 'Lightweight hair dryer with multiple speed settings.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (95, 'Whole Wheat Pita Bread', 2.79, 'Soft and fluffy whole wheat pita bread, great for wraps.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (96, 'Dark Chocolate Covered Almonds', 7.19, 'Roasted almonds dipped in rich dark chocolate.', '3XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (97, 'Air Purifier', 129.99, 'HEPA air purifier for clean indoor air.', 'XS');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (98, 'Balsamic Vinegar', 4.99, 'Rich and tangy balsamic vinegar, perfect for dressings.', 'XL');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (99, 'Set of Silicone Baking Molds', 15.99, 'Flexible molds perfect for baking cakes and pastries.', 'L');
insert into PRODUCTOS (id, nombre, precio, descripcion, tamanio) values (100, 'Electric Food Steamer', 59.99, 'Electric food steamer for healthy cooking.', '2XL');

CREATE TABLE CONTIENE( --lleva llave foranea
id int PRIMARY KEY AUTO_INCREMENT,
cantidad int NOT NULL,
precio float NOT NULL,
);

CREATE TABLE PRODUCTOS(
id int PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
precio float NOT NULL,
descripcion char(100),
tamanio char() NOT NULL, -- EJEM 'C', 'M', 'G'
);

CREATE TABLE CATEGORIA(
id in PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
);

CREATE TABLE INVENTARIO(
id in PRIMARY KEY AUTO_INCREMENT,
nombre char NOT NULL,
stock int NOT NULL,
fecha_caducidad date() NOT NULL,--Consultar formado de fecha
fecha_entrada date() NOT NULL,--Consultar formado de fecha
tipo_almacenamiento char NOT NULL,
);
