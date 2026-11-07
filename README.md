Question
G1. Route model binding needs two things to be true. Name both, and say what happens when only one of them is.
Answer: First is the controller parameter has to be type-hinted with the model class like Product $product and second the parameter name has to match the route segment exactly. So the Route::resource('products') makes the segment {product} that the variable must be $product.

G2. Your Delete link opened the detail page instead of deleting anything. Explain why.
Answer: Because a link is can only send a GET request so the destroy route answers delete and show answers GET at the same address. So if the browser sent a GET the laravel matched it to show and the detail page opened. Nothing was deleted and there was no error and a form with @method('DELETE') fixes it because it sends a POST with a hidden field saying the real method is DELETE.

G3. old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?
Answer: If I leave it out and write only old('name') the form opens empty because there is nothing to fall back on until a failed submit. so if I use only the record’s value and skip old() a rejected submit throws away what I typed and puts the saved values back. The old('name', $product->name) have does both record’s value on first load, and what I typed after a validation error.

