G1. Which column did you turn into a table, and why that one and not another?
Answer: I made the category table because my products is only use a few categories like Snacks, Canned Goods, Beverages and others and the same ones keep repeating across the rows so it made sense to store each one once and the price, stock and availability are just plain values, so they didn't need their own table.

G2. What number did screenshot 6 show, and why exactly that number?
Answer: It showed 7 beacuse the one query is loaded the 6 products and then one more query ran for each
product to fetch its category so it became a 1 + 6 = 7. After I added with('category') it dropped to queries 2.

G3. Your belongsTo method is named in the singular. What would break if you made it plural?
Answer: the eloquent takes the method name and adds _id on the category to find the foreign key column. If I named it categories() probably it would look for categories_id which doesn't exist in my products table so the relationship would fail.
