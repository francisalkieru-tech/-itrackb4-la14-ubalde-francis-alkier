
Question
H1. The top of your error page named a file inside vendor. Say why that was not where your mistake was, and where the page showed you it actually was. 
Answer: The file at the top of the error page was in vendor because that is where Laravel stopped and when it could not run the Product::withh(). My mistake is in the extra letter in index() of ProductController.php  which the Exception trace had already opened with that line marked.

H2. You wrote one Log::info line with a context array. Name something it will tell you next month that the error page could not.
Answer: My Log::info line tells me which product was saved and when. The error page only shows a failure while it happens and cannot show a successful save.

H3. Your guard answers with 403 instead of redirecting back with a message. Say when each of the two is the better answer.
Answer: A 403 is better when the request should never be allowed, like deleting the last product in a category. A redirect with a message is better when the user can correct something and try again, like leaving a field empty.
