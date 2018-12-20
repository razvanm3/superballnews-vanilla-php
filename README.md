#Superballews - Vanilla PHP Version

![Superballnews](https://i.imgur.com/U5fkDmX.png)


<h3>1.What is Superballnews?</h3>


<p>Superballnews is a simple sports news blog; it also represents my High School Gradution Certificate in programming.</p>
<p>Superballnews offers both the user and the administrator an user friendly interface, easily usable even by those not tech savy.</p>


<h3>2.Frameworks, languages and other tools used:</h3>

<ul>
<li>HTML5</li>
<li>CSS</li>
<li>PHP</li>
<li>MySQL</li>
<li>Bootstrap</li>
<li>TinyMCE as WYSIWYG editor</li>
<li>Disqus as chat platform</li>
</ul>

<h3>3.How to test locally:</h3>

<h4>I.Requirements:</h4>
<ul>
<li>XAMPP installed on your computer</li>
<li>Operating System: Windows 7 or above</li>
</ul>

<h4>II. Installation:</h4>


<p>Copy the repository folder to xampp/htdocs/</p>

<p>Go to http://localhost/phpmyadmin/ and create a database called <i>blogdb</i></p>

<p>Import the blogdb.sql file provided in the repository</p>

<p>Go to admin/config/ and add your database credentials in to database.php and database1.php files</p>

```shell
    private $host = "localhost";
    private $db_name = "blogdb";
    private $username = "root";
    private $password = "";
```

<p>Now you can acces the project at http://localhost/superballnews/</p>


<h3>4.Creator:</h3>
<h4>Razvan Mihai</h4>