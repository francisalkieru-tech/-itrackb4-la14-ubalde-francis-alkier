Question
F1. Authentication and authorisation are not the same. In one sentence each: what did this lesson give you, and what is still missing next meeting?
Answer: This lesson give my products app authentication so it now knows who is using it through register, login, and logout. What is still missing is authorisation which decides what each user is allowed to do. Right now any account I register can edit or delete every product and roles in the next meeting should fix that.

F2. Why does a successful login call session()->regenerate()? What goes wrong if you skip it?
Answer: After a successful login regenerate() gives me a new session ID so If I skip it someone who already knew the old session ID from before I logged in could use it and be signed in as me. 

F3. Why does a failed login use the same message for a wrong password and an unknown email?
Answer: My login shows The provided credentials do not match our records. in both cases and If the message said email not found for one and wrong password for the other, a stranger could keep trying emails and learn which ones are registered in my app.

F4. Why do index and show stay public while create/edit/update/destroy use auth?
Answer: The index and show only read data so anyone should be able to browse the product catalogue without an account and create, store, edit, update, and destroy change the data so I put them behind the auth middleware with middlewareFor on the products resource route. Guests can still view products but cannot change anything.

F5. You hid Add (and actions) for guests. Why is that not enough to secure those actions? What actually stops a stranger?
Answer: I wrapped the Add button and the Action column in @auth but that only hides them from guests and the URLs like /products/create and /products/1/edit still exist and a guest can type them in the address bar. What actually stops a stranger is the auth middleware which redirected me to the login page when I tried it in the InPrivate window screenshots 9, 17, and 19.

F6. In screenshot 20 the route name was wrong. Why does auth middleware care that the route is named exactly login?
Answer: When a guest hits a protected page the auth middleware redirects them to the route named login and It looks for that name not the /login URL. When I renamed it to signin for screenshot 20 the Laravel threw Route [login] not defined. coming from code I never wrote myself, so the name has to stay exactly login.
