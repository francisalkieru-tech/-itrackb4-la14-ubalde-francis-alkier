Question
J1. Your HomeController is not a resource controller. Name two things an index() on a resource controller does that yours does not have to.
Answer: My ProductController's index() is gets the products from the database and splits them into pages with paginate(6) and It also reads search, category, available and sort from the URL to filter and order the list. My HomeController index does none of that its only returns the front page with the product and category counts.
J2. Your pagination links lost the search term until you added one method. Say what those links contained before, and what the controller therefore received.
Answer: Before the fix the page links only had ?page=2 so the controller got the page number but no search value and skipped the where('name', 'like', "%{$search}%")line. That is why page 2 showed the full list and an empty search box and adding withQueryString() after paginate(6)fixed it.

J3. A misspelled sort value does not break your page. Explain why that is worse than an error, and what your allowed list does about it.
Answer: When I typed ?sort=nmae the page still loaded but the list was not sorted by anything and nothing told me something was wrong. That is worse than an error because nobody would notice it. My allowed list only accepts name, price and stock and anything else falls back to name.
