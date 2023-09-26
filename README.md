<b>Laravel application<b> <br><br>
Hello everyone. Daily blog is a basic rest api app that can be used to create blog posts. I created this app to improve my feature test skills using out-of-the-box methods.<br>
<br>How to run it?<br><br>
We have to create two databases first one is daily_blog and the second one is for testing daiy_blog_test. I decided to separate testing records far from the main database because of the mess in the data. The test database is refreshing as always when we run tests, so we have confidence that everything should be fine. The project obviously has documentation, we can generate it by writing in the console command php artisan scribe:generate and we have it on the localhost server http://localhost:8000/docs#introduction.
